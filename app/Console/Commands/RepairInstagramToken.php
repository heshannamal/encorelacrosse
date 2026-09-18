<?php

namespace App\Console\Commands;

use App\Models\InstagramAccount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class RepairInstagramToken extends Command
{
    protected $signature = 'instagram:repair-token
                            {--from-env : Use INSTAGRAM_ACCESS_TOKEN instead of prompting}
                            {--user-id= : Instagram user ID; defaults to INSTAGRAM_USER_ID then DB}';

    protected $description = 'Verify and save the Encore Lacrosse Instagram token using the current APP_KEY';

    public function handle(): int
    {
        $account = InstagramAccount::query()
            ->where('active', true)
            ->first();

        $userId = trim((string) $this->option('user-id'));

        if ($userId === '') {
            $userId = trim((string) config('services.instagram.user_id', ''));
        }

        if ($userId === '' && $account) {
            $userId = trim((string) $account->instagram_user_id);
        }

        if ($userId === '') {
            $this->error('Instagram user ID is missing. Set INSTAGRAM_USER_ID or use --user-id=.');

            return self::FAILURE;
        }

        if ($this->option('from-env')) {
            $accessToken = trim((string) config('services.instagram.access_token', ''));
        } else {
            $accessToken = trim((string) $this->secret(
                'Paste the valid long-lived Instagram access token for @encorelacrosse'
            ));
        }

        if ($accessToken === '') {
            $this->error('Instagram access token is missing.');

            return self::FAILURE;
        }

        $apiVersion = config('services.instagram.version', 'v25.0');
        $baseUrl = sprintf('https://graph.instagram.com/%s', $apiVersion);

        try {
            $this->info('Verifying @encorelacrosse Instagram credentials...');

            $response = Http::acceptJson()
                ->timeout(30)
                ->retry(2, 1000)
                ->get("{$baseUrl}/{$userId}", [
                    'fields' => 'id,user_id,username,media_count',
                    'access_token' => $accessToken,
                ]);

            if ($response->failed()) {
                throw new RuntimeException(
                    $response->json('error.message')
                    ?? $response->body()
                    ?? 'Unknown Instagram API error.'
                );
            }

            $profileData = $response->json();
            $profile = $profileData['data'][0] ?? $profileData;

            $expectedUsername = strtolower(ltrim(trim((string) config(
                'services.instagram.username',
                'encorelacrosse'
            )), '@'));

            $actualUsername = strtolower(ltrim(trim((string) ($profile['username'] ?? '')), '@'));

            if ($actualUsername === '') {
                throw new RuntimeException('Instagram did not return an account username.');
            }

            if ($actualUsername !== $expectedUsername) {
                throw new RuntimeException(
                    "These credentials belong to @{$actualUsername}, not @{$expectedUsername}. Nothing was saved."
                );
            }

            $account ??= new InstagramAccount();

            $account->instagram_user_id = $userId;
            $account->username = $expectedUsername;
            $account->access_token = $accessToken;
            $account->last_refreshed_at = now();
            $account->last_refresh_attempt_at = now();
            $account->last_refresh_error = null;
            $account->active = true;
            $account->save();

            Cache::forget('instagram_feed.encore.current');
            Cache::forget('instagram_feed.encore.backup');

            $this->info('Encore Lacrosse Instagram token saved successfully.');
            $this->line('Account: @' . $expectedUsername);

            return self::SUCCESS;
        } catch (Throwable $exception) {
            $this->error('Instagram token setup failed: ' . $exception->getMessage());

            return self::FAILURE;
        }
    }
}
