<?php

namespace App\Services\Encore;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class EncoreApiClient
{
    protected string $baseUrl;
    protected string $assetUrl;
    protected string $apiKey;
    protected string $apiToken;
    protected int $timeout;
    protected int $connectTimeout;
    protected ?int $salesChannelId;
    protected ?int $inventoryTypeId;

    public function __construct()
    {
        $this->baseUrl = rtrim((string) config('services.encore.base_url', ''), '/');
        $this->assetUrl = rtrim((string) config('services.encore.asset_url', ''), '/');
        $this->apiKey = trim((string) config('services.encore.api_key', ''));
        $this->apiToken = trim((string) config('services.encore.api_token', ''));
        $this->timeout = max(1, (int) config('services.encore.timeout', 30));
        $this->connectTimeout = max(1, (int) config('services.encore.connect_timeout', 10));
        $this->salesChannelId = $this->nullableInt(config('services.encore.sales_channel_id'));
        $this->inventoryTypeId = $this->nullableInt(config('services.encore.inventory_type_id'));
    }

    public function get(string $endpoint, array $query = [], bool $withSystemHeaders = true): array
    {
        return $this->request('get', $endpoint, $query, $withSystemHeaders);
    }

    public function post(string $endpoint, array $payload = [], bool $withSystemHeaders = true): array
    {
        return $this->request('post', $endpoint, $payload, $withSystemHeaders);
    }

    public function put(string $endpoint, array $payload = [], bool $withSystemHeaders = true): array
    {
        return $this->request('put', $endpoint, $payload, $withSystemHeaders);
    }

    public function delete(string $endpoint, array $payload = [], bool $withSystemHeaders = true): array
    {
        return $this->request('delete', $endpoint, $payload, $withSystemHeaders);
    }

    public function asset($path): string
    {
        if (empty($path)) {
            return asset('images/product-placeholder.svg');
        }

        $path = str_replace('\\', '/', (string) $path);

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        $path = ltrim($path, '/');

        if (
            Str::endsWith(strtolower($this->assetUrl), '/assets') &&
            Str::startsWith(strtolower($path), 'assets/')
        ) {
            $path = substr($path, 7);
        }

        $encoded = collect(explode('/', $path))
            ->map(fn ($part) => rawurlencode(rawurldecode($part)))
            ->implode('/');

        return $this->assetUrl !== ''
            ? $this->assetUrl . '/' . $encoded
            : asset($path);
    }

    public function currentUserId(): ?int
    {
        $id = data_get(session('encore_user'), 'id', session('auth_user_id'));
        return $id ? (int) $id : null;
    }

    public function bearerToken(): ?string
    {
        $token = session('encore_user_token') ?: session('auth_api_token');
        return filled($token) ? (string) $token : null;
    }

    public function authenticated(): bool
    {
        return $this->bearerToken() !== null && $this->currentUserId() !== null;
    }

    public function configurationStatus(): array
    {
        return [
            'base_url' => $this->baseUrl,
            'asset_url' => $this->assetUrl,
            'api_key_configured' => $this->apiKey !== '',
            'api_token_configured' => $this->apiToken !== '',
            'sales_channel_id' => $this->salesChannelId,
            'inventory_type_id' => $this->inventoryTypeId,
            'timeout' => $this->timeout,
            'connect_timeout' => $this->connectTimeout,
        ];
    }

    protected function request(string $method, string $endpoint, array $data, bool $withSystemHeaders): array
    {
        $this->assertConfigured($withSystemHeaders);

        $endpoint = ltrim($endpoint, '/');
        $url = $this->baseUrl . '/' . $endpoint;

        try {
            $client = $this->client($withSystemHeaders);
            $response = $method === 'get'
                ? $client->get($url, $data)
                : $client->{$method}($url, $data);

            $contentType = strtolower((string) $response->header('Content-Type'));
            $decoded = $response->json();
            $json = is_array($decoded) ? $decoded : [];
            $json['_http_status'] = $response->status();

            if (!is_array($decoded)) {
                Log::warning('Encore API returned a non-JSON response.', [
                    'endpoint' => $endpoint,
                    'status' => $response->status(),
                    'content_type' => $contentType,
                    'body_preview' => Str::limit(strip_tags((string) $response->body()), 300),
                ]);

                return [
                    'success' => false,
                    'message' => 'The shop service returned an invalid response. Please try again.',
                    '_http_status' => $response->status(),
                    '_error_code' => 'encore_non_json_response',
                ];
            }

            if (!$response->successful()) {
                Log::warning('Encore API request returned an error.', [
                    'endpoint' => $endpoint,
                    'status' => $response->status(),
                    'response' => $this->safeLogResponse($json),
                ]);

                $json['success'] = false;
                $json['message'] = $this->publicMessage($json['message'] ?? null, $response->status());
            }

            return $json;
        } catch (ConnectionException $e) {
            Log::error('Encore API connection failed.', [
                'endpoint' => $endpoint,
                'base_url' => $this->baseUrl,
                'message' => $e->getMessage(),
            ]);

            throw new RuntimeException('The shop service is currently unreachable. Please try again.', 0, $e);
        } catch (Throwable $e) {
            Log::error('Encore API request failed.', [
                'endpoint' => $endpoint,
                'base_url' => $this->baseUrl,
                'message' => $e->getMessage(),
            ]);

            throw new RuntimeException('We could not complete your request. Please try again.', 0, $e);
        }
    }

    protected function client(bool $withSystemHeaders): PendingRequest
    {
        $client = Http::acceptJson()
            ->asJson()
            ->timeout($this->timeout)
            ->connectTimeout($this->connectTimeout)
            ->withHeaders($this->headers($withSystemHeaders));

        if ($this->bearerToken()) {
            $client = $client->withToken($this->bearerToken());
        }

        return $client;
    }

    protected function headers(bool $withSystemHeaders): array
    {
        $headers = ['X-Requested-With' => 'XMLHttpRequest'];

        if ($withSystemHeaders) {
            $headers['API-Key'] = $this->apiKey;
            $headers['API-Token'] = $this->apiToken;

            if ($this->salesChannelId) {
                $headers['Sales-Channel-Id'] = (string) $this->salesChannelId;
            }

            if ($this->inventoryTypeId) {
                $headers['Inventory-Type-Id'] = (string) $this->inventoryTypeId;
            }
        }

        if ($this->authenticated()) {
            $headers['X-User-Id'] = (string) $this->currentUserId();
        }

        return $headers;
    }

    protected function assertConfigured(bool $withSystemHeaders): void
    {
        if ($this->baseUrl === '') {
            throw new RuntimeException('Shop configuration is incomplete. Please configure the Encore API URL.');
        }

        if (!filter_var($this->baseUrl, FILTER_VALIDATE_URL)) {
            throw new RuntimeException('Shop configuration contains an invalid Encore API URL.');
        }

        if ($withSystemHeaders && ($this->apiKey === '' || $this->apiToken === '')) {
            throw new RuntimeException('Shop configuration is incomplete. Please configure the Encore API credentials.');
        }
    }

    protected function nullableInt($value): ?int
    {
        return ($value === null || $value === '') ? null : (int) $value;
    }

    protected function publicMessage(?string $message, int $status = 0): string
    {
        $message = trim((string) $message);

        if ($status === 401 && $this->bearerToken()) {
            return 'Your shop session has expired. Please sign in again.';
        }

        if ($status === 403) {
            return 'The shop service rejected this request. Please try again.';
        }

        if ($status === 404 && $message === '') {
            return 'The requested shop resource was not found.';
        }

        if ($message === '') {
            return 'We could not complete your request. Please try again.';
        }

        $technicalPatterns = [
            'sqlstate', 'curl', 'stack trace', 'undefined', 'exception',
            'vendor/', 'localhost', 'api-key', 'api-token', 'invalid_bearer_token',
        ];

        $lower = strtolower($message);
        foreach ($technicalPatterns as $pattern) {
            if (str_contains($lower, $pattern)) {
                return 'We could not complete your request. Please try again.';
            }
        }

        return $message;
    }

    protected function safeLogResponse(array $json): array
    {
        foreach (['token', 'access_token', 'authorization', 'card_number', 'card_csv'] as $key) {
            if (array_key_exists($key, $json)) {
                $json[$key] = '[REDACTED]';
            }
        }

        if (isset($json['data']) && is_array($json['data'])) {
            foreach (['token', 'access_token', 'authorization', 'card_number', 'card_csv'] as $key) {
                if (array_key_exists($key, $json['data'])) {
                    $json['data'][$key] = '[REDACTED]';
                }
            }
        }

        return $json;
    }
}
