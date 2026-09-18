<?php

namespace App\Http\Controllers;

use App\Models\InstagramAccount;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class InstagramFeedController extends Controller
{
    private const CACHE_KEY = 'instagram_feed.encore.current';
    private const BACKUP_CACHE_KEY = 'instagram_feed.encore.backup';
    private const DISPLAY_NAME = 'ENCORE LACROSSE';
    private const DEFAULT_USERNAME = 'encorelacrosse';

    public function index(): JsonResponse
    {
        $cached = Cache::get(self::CACHE_KEY);

        if (is_array($cached) && $this->isExpectedPayload($cached)) {
            return response()->json($cached);
        }

        if (is_array($cached)) {
            Cache::forget(self::CACHE_KEY);
        }

        try {
            $payload = $this->buildInstagramFeed();

            Cache::put(self::CACHE_KEY, $payload, now()->addMinutes(30));
            Cache::put(self::BACKUP_CACHE_KEY, $payload, now()->addDays(30));

            return response()->json($payload);
        } catch (Throwable $exception) {
            $this->logInstagramFailure(
                'Encore Lacrosse Instagram feed unavailable.',
                $exception
            );
        }

        $backup = Cache::get(self::BACKUP_CACHE_KEY);

        if (is_array($backup) && $this->isExpectedPayload($backup)) {
            $backup['stale'] = true;

            return response()->json($backup);
        }

        return response()->json([
            'success' => false,
            'message' => 'Encore Lacrosse Instagram feed is temporarily unavailable.',
            'items' => [],
            'stale' => false,
        ], 503);
    }

    private function buildInstagramFeed(): array
    {
        $account = InstagramAccount::query()
            ->where('active', true)
            ->first();

        $credentials = $this->resolveCredentials($account);
        $userId = $credentials['user_id'];
        $accessToken = $credentials['access_token'];
        $apiVersion = config('services.instagram.version', 'v25.0');
        $feedLimit = max(1, min(12, (int) config('services.instagram.feed_limit', 8)));
        $baseUrl = sprintf('https://graph.instagram.com/%s', $apiVersion);

        $profileResponse = Http::acceptJson()
            ->timeout(20)
            ->retry(2, 500)
            ->get("{$baseUrl}/{$userId}", [
                'fields' => implode(',', [
                    'id',
                    'user_id',
                    'name',
                    'username',
                    'profile_picture_url',
                    'media_count',
                    'followers_count',
                    'follows_count',
                    'website',
                    'biography',
                ]),
                'access_token' => $accessToken,
            ])
            ->throw();

        $profileData = $profileResponse->json();
        $profile = $profileData['data'][0] ?? $profileData;

        $expectedUsername = $this->expectedUsername();
        $actualUsername = strtolower(ltrim(trim((string) ($profile['username'] ?? '')), '@'));

        if ($actualUsername === '') {
            throw new RuntimeException('Instagram did not return an account username.');
        }

        if ($actualUsername !== $expectedUsername) {
            throw new RuntimeException(
                "Configured Instagram credentials belong to @{$actualUsername}, not @{$expectedUsername}."
            );
        }

        $mediaResponse = Http::acceptJson()
            ->timeout(20)
            ->retry(2, 500)
            ->get("{$baseUrl}/{$userId}/media", [
                'fields' => implode(',', [
                    'id',
                    'caption',
                    'media_type',
                    'media_product_type',
                    'media_url',
                    'thumbnail_url',
                    'permalink',
                    'timestamp',
                    'like_count',
                    'comments_count',
                ]),
                'limit' => $feedLimit,
                'access_token' => $accessToken,
            ])
            ->throw();

        $items = collect($mediaResponse->json('data', []))
            ->map(function (array $post): array {
                $mediaType = strtoupper((string) ($post['media_type'] ?? 'IMAGE'));

                $imageUrl = $mediaType === 'VIDEO'
                    ? ($post['thumbnail_url'] ?? $post['media_url'] ?? null)
                    : ($post['media_url'] ?? $post['thumbnail_url'] ?? null);

                return [
                    'id' => $post['id'] ?? null,
                    'caption' => $post['caption'] ?? '',
                    'media_type' => $mediaType,
                    'media_product_type' => $post['media_product_type'] ?? null,
                    'image_url' => $imageUrl,
                    'permalink' => $post['permalink'] ?? null,
                    'like_count' => isset($post['like_count']) ? (int) $post['like_count'] : null,
                    'comments_count' => isset($post['comments_count']) ? (int) $post['comments_count'] : null,
                    'timestamp' => $post['timestamp'] ?? null,
                ];
            })
            ->filter(fn (array $post): bool => !empty($post['image_url']) && !empty($post['permalink']))
            ->values()
            ->all();

        $payload = [
            'success' => true,
            'profile' => [
                'id' => $profile['user_id'] ?? $profile['id'] ?? $userId,
                'name' => self::DISPLAY_NAME,
                'username' => $expectedUsername,
                'url' => 'https://www.instagram.com/' . rawurlencode($expectedUsername) . '/',
                'profile_image' => $profile['profile_picture_url'] ?? null,
                'posts' => (int) ($profile['media_count'] ?? count($items)),
                'followers' => (int) ($profile['followers_count'] ?? 0),
                'following' => (int) ($profile['follows_count'] ?? 0),
                'website' => $profile['website'] ?? null,
                'biography' => $profile['biography'] ?? null,
            ],
            'items' => $items,
            'updated_at' => now()->toIso8601String(),
            'stale' => false,
            'source' => 'instagram_graph_api',
        ];

        if ($credentials['repair_database']) {
            $this->repairDatabaseAccount(
                $account,
                $userId,
                $expectedUsername,
                $accessToken
            );
        }

        return $payload;
    }

    private function resolveCredentials(?InstagramAccount $account): array
    {
        $configuredUserId = trim((string) config('services.instagram.user_id', ''));
        $configuredToken = trim((string) config('services.instagram.access_token', ''));

        $databaseUserId = $account ? trim((string) $account->instagram_user_id) : '';
        $databaseToken = '';
        $databaseTokenUnreadable = false;

        if ($account) {
            try {
                $databaseToken = trim((string) $account->access_token);
            } catch (DecryptException $exception) {
                $databaseTokenUnreadable = true;

                Log::warning('Stored Instagram token could not be decrypted.', [
                    'instagram_account_id' => $account->id,
                ]);
            }
        }

        $userId = $configuredUserId !== '' ? $configuredUserId : $databaseUserId;
        $accessToken = $configuredToken !== '' ? $configuredToken : $databaseToken;

        if ($userId === '') {
            throw new RuntimeException('Instagram user ID is not configured.');
        }

        if ($accessToken === '') {
            if ($databaseTokenUnreadable) {
                throw new RuntimeException(
                    'The stored Instagram token cannot be decrypted. Run php artisan instagram:repair-token.'
                );
            }

            throw new RuntimeException('Instagram access token is not configured.');
        }

        $expectedUsername = $this->expectedUsername();
        $databaseUsername = $account
            ? strtolower(ltrim(trim((string) $account->username), '@'))
            : '';

        return [
            'user_id' => $userId,
            'access_token' => $accessToken,
            'repair_database' => !$account
                || ($configuredUserId !== '' && $databaseUserId !== $configuredUserId)
                || ($configuredToken !== '' && ($databaseTokenUnreadable || $databaseToken !== $configuredToken))
                || ($databaseUsername !== '' && $databaseUsername !== $expectedUsername),
        ];
    }

    private function repairDatabaseAccount(
        ?InstagramAccount $account,
        string $userId,
        string $username,
        string $accessToken
    ): void {
        try {
            $account ??= new InstagramAccount();

            $account->instagram_user_id = $userId;
            $account->username = $username;
            $account->access_token = $accessToken;
            $account->active = true;
            $account->last_refresh_error = null;
            $account->save();
        } catch (Throwable $exception) {
            Log::warning('Instagram feed loaded but account sync failed.', [
                'error' => $exception->getMessage(),
            ]);
        }
    }

    private function isExpectedPayload(array $payload): bool
    {
        if (!($payload['success'] ?? false)) {
            return false;
        }

        $username = strtolower(ltrim(
            trim((string) data_get($payload, 'profile.username', '')),
            '@'
        ));

        return $username !== '' && $username === $this->expectedUsername();
    }

    private function expectedUsername(): string
    {
        $username = strtolower(ltrim(trim((string) config(
            'services.instagram.username',
            self::DEFAULT_USERNAME
        )), '@'));

        return $username !== '' ? $username : self::DEFAULT_USERNAME;
    }

    private function logInstagramFailure(string $message, Throwable $exception): void
    {
        $context = [
            'exception' => get_class($exception),
            'message' => $exception->getMessage(),
        ];

        if ($exception instanceof RequestException && $exception->response) {
            $context['instagram_status'] = $exception->response->status();
            $context['instagram_response'] = $exception->response->json()
                ?: $exception->response->body();
        }

        Log::warning($message, $context);
    }
}
