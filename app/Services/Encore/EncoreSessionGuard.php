<?php

namespace App\Services\Encore;

use Illuminate\Support\Facades\Cache;
use RuntimeException;
use Throwable;

class EncoreSessionGuard
{
    protected ?bool $checked = null;

    public function __construct(protected AuthApiService $auth)
    {
    }

    public function valid(): bool
    {
        if (!session('encore_user_token') && !session('auth_api_token')) {
            return false;
        }

        if ($this->checked !== null) {
            return $this->checked;
        }

        $response = $this->auth->me();

        if (($response['success'] ?? false) && (int) ($response['_http_status'] ?? 200) < 400) {
            $user = data_get($response, 'data.user');
            if (is_array($user) && $user) {
                session(['encore_user' => $user]);
            }
            return $this->checked = true;
        }

        $status = (int) ($response['_http_status'] ?? 0);
        $errorCode = (string) ($response['error_code'] ?? '');

        if ($status === 401 || $errorCode === 'INVALID_BEARER_TOKEN') {
            $this->clear();
            return $this->checked = false;
        }

        throw new RuntimeException($response['message'] ?? 'We could not verify your session. Please try again.');
    }

    public function clear(): void
    {
        $userId = (int) data_get(session('encore_user'), 'id', 0);

        if ($userId > 0) {
            try {
                Cache::store('file')->forget('encorelacrosse:checkout:billing:' . $userId);
            } catch (Throwable $e) {
                // Session cleanup must continue.
            }
        }

        session()->forget([
            'encore_user_token',
            'encore_user_token_type',
            'auth_api_token',
            'auth_user_id',
            'encore_user',
            'encore_user_roles',
            'encore_user_permissions',
            'encore_cart_merge_pending',
            'encore_billing_saved',
            'encore_temp_billing_detail_id',
            'encore_checkout_billing',
        ]);
    }
}
