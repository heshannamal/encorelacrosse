<?php

namespace App\Console\Commands;

use App\Models\InstagramAccount;
use Illuminate\Console\Command;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class RefreshInstagramToken extends Command
{
    protected $signature = 'instagram:refresh-token
                            {--force : Refresh even when the token is not close to expiry}';

    protected $description = 'Refresh the long-lived Encore Lacrosse Instagram access token';

    public function handle(): int
    {
        $account = InstagramAccount::query()
            ->where('active', true)
            ->first();

        if (!$account) {
            $this->error('No active Instagram account was found.');
            $this->line('Set INSTAGRAM_USER_ID and INSTAGRAM_ACCESS_TOKEN, then run php artisan instagram:repair-token --from-env.');

            return self::FAILURE;
        }

        try {
            $accessToken = $this->resolveAccessToken($account);

            if (
                !$this->option('force') &&
                $account->token_expires_at &&
                $account->token_expires_at->greaterThan(now()->addDays(20))
            ) {
                $daysRemaining = now()->diffInDays($account->token_expires_at, false);
                $this->info("Instagram token does not need renewal yet. Approximately {$daysRemaining} days remain.");

                return self::SUCCESS;
            }

            $account->update([
                'last_refresh_attempt_at' => now(),
                'last_refresh_error' => null,
            ]);

            $response = Http::acceptJson()
                ->timeout(30)
                ->retry(2, 1000)
                ->get('https://graph.instagram.com/refresh_access_token', [
                    'grant_type' => 'ig_refresh_token',
                    'access_token' => $accessToken,
                ]);

            if ($response->failed()) {
                throw new RuntimeException(
                    $response->json('error.message')
                    ?? $response->body()
                    ?? 'Unknown Instagram API error.'
                );
            }

            $data = $response->json();
            $newToken = $data['access_token'] ?? null;
            $expiresIn = (int) ($data['expires_in'] ?? 0);

            if (!$newToken || $expiresIn <= 0) {
                throw new RuntimeException('Instagram did not return a valid refreshed token.');
            }

            $account->update([
                'access_token' => $newToken,
                'token_expires_at' => now()->addSeconds($expiresIn),
                'last_refreshed_at' => now(),
                'last_refresh_attempt_at' => now(),
                'last_refresh_error' => null,
            ]);

            Cache::forget('instagram_feed.encore.current');
            Cache::forget('instagram_feed.encore.backup');

            $this->info('Encore Lacrosse Instagram token refreshed successfully.');
            $this->line('New expiry: ' . $account->token_expires_at->toDateTimeString());

            return self::SUCCESS;
        } catch (Throwable $exception) {
            report($exception);

            try {
                $account->update([
                    'last_refresh_attempt_at' => now(),
                    'last_refresh_error' => $exception->getMessage(),
                ]);
            } catch (Throwable $ignored) {
            }

            Log::error('Encore Instagram token refresh failed.', [
                'error' => $exception->getMessage(),
            ]);

            $this->error('Instagram token refresh failed: ' . $exception->getMessage());

            return self::FAILURE;
        }
    }

    private function resolveAccessToken(InstagramAccount $account): string
    {
        $configuredToken = trim((string) config('services.instagram.access_token', ''));

        if ($configuredToken !== '') {
            try {
                $storedToken = trim((string) $account->access_token);
            } catch (DecryptException $exception) {
                $storedToken = '';
            }

            if ($storedToken !== $configuredToken) {
                $account->access_token = $configuredToken;
                $account->last_refresh_error = null;
                $account->save();
            }

            return $configuredToken;
        }

        return trim((string) $account->access_token);
    }
}
