<?php

namespace App\Http\Controllers;

use App\Services\Encore\AuthApiService;
use App\Services\Encore\CartMergeService;
use App\Services\Encore\EncoreSessionGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class EncoreAuthController extends Controller
{
    public function __construct(
        protected AuthApiService $auth,
        protected CartMergeService $merge,
        protected EncoreSessionGuard $guard
    ) {
    }

    public function showLogin()
    {
        if (session('encore_user_token')) {
            try {
                if ($this->guard->valid()) {
                    return redirect()->route('allProduct');
                }
            } catch (Throwable $e) {
                return view('shop.auth.login')->with('apiError', $e->getMessage());
            }
        }

        return view('shop.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            $this->guard->clear();
            $response = $this->auth->login($request->email, $request->password);

            if (!($response['success'] ?? false) || empty(data_get($response, 'data.token'))) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Unable to sign in.',
                ], (int) ($response['_http_status'] ?? 401));
            }

            $this->storeSession($response);

            if (!$this->guard->valid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sign in could not be completed. Please try again.',
                ], 401);
            }

            $merge = $this->merge->claimGuestCart();

            return response()->json([
                'success' => true,
                'message' => 'Welcome back!',
                'warning' => !empty($merge['warnings']) ? implode(' ', $merge['warnings']) : null,
                'redirect' => session()->pull('url.intended', route('allProduct')),
            ]);
        } catch (Throwable $e) {
            Log::error('Encore shop login failed.', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'We could not sign you in. Please try again.',
            ], 500);
        }
    }

    public function showRegister()
    {
        if (session('encore_user_token')) {
            try {
                if ($this->guard->valid()) {
                    return redirect()->route('allProduct');
                }
            } catch (Throwable $e) {
                // Continue to registration page.
            }
        }

        return view('shop.auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            $this->guard->clear();
            $response = $this->auth->register([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'password' => $request->password,
                'inventory_id' => (int) config('services.encore.inventory_type_id', 2),
            ]);

            if (!($response['success'] ?? false) || empty(data_get($response, 'data.token'))) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Unable to create your account.',
                ], (int) ($response['_http_status'] ?? 422));
            }

            $this->storeSession($response);

            if (!$this->guard->valid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Account created, but sign in could not be completed. Please sign in.',
                ], 401);
            }

            $merge = $this->merge->claimGuestCart();

            return response()->json([
                'success' => true,
                'message' => 'Your account has been created.',
                'warning' => !empty($merge['warnings']) ? implode(' ', $merge['warnings']) : null,
                'redirect' => session()->pull('url.intended', route('allProduct')),
            ]);
        } catch (Throwable $e) {
            Log::error('Encore shop registration failed.', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'We could not create your account. Please try again.',
            ], 500);
        }
    }

    public function redirectToGoogle()
    {
        if (session('encore_user_token')) {
            try {
                if ($this->guard->valid()) {
                    return redirect()->route('allProduct');
                }
            } catch (Throwable $e) {
                // Continue to Google.
            }
        }

        try {
            return Socialite::driver('google')->redirect();
        } catch (Throwable $e) {
            Log::error('Google OAuth redirect failed.', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Google sign in is temporarily unavailable.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();

            if (!$email) {
                throw new \RuntimeException('Google did not return an email address.');
            }

            $raw = is_array($googleUser->user ?? null) ? $googleUser->user : [];
            $firstName = $raw['given_name'] ?? '';
            $lastName = $raw['family_name'] ?? '';

            if ($firstName === '') {
                $parts = preg_split('/\s+/', trim((string) $googleUser->getName()), 2);
                $firstName = $parts[0] ?? '';
                $lastName = $parts[1] ?? '';
            }

            $this->guard->clear();
            $response = $this->auth->socialLogin([
                'email' => $email,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'inventory_id' => (int) config('services.encore.inventory_type_id', 2),
                'is_social' => 1,
            ]);

            if (!($response['success'] ?? false) || empty(data_get($response, 'data.token'))) {
                throw new \RuntimeException($response['message'] ?? 'Google sign in could not be completed.');
            }

            $this->storeSession($response);

            if (!$this->guard->valid()) {
                throw new \RuntimeException('The new sign-in session could not be verified.');
            }

            $merge = $this->merge->claimGuestCart();
            if (!empty($merge['warnings'])) {
                session()->flash('warning', implode(' ', $merge['warnings']));
            }

            return redirect()
                ->to(session()->pull('url.intended', route('allProduct')))
                ->with('success', 'Signed in successfully.');
        } catch (Throwable $e) {
            Log::error('Google OAuth callback failed.', ['message' => $e->getMessage()]);
            return redirect()->route('login')->with('error', 'Google sign in could not be completed. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        try {
            if (session('encore_user_token')) {
                $this->auth->logout();
            }
        } catch (Throwable $e) {
            // Local sign-out must still complete.
        }

        $this->guard->clear();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been signed out.');
    }

    protected function storeSession(array $response): void
    {
        $data = $response['data'] ?? [];

        session([
            'encore_user_token_type' => $data['token_type'] ?? 'Bearer',
            'encore_user_token' => $data['token'] ?? null,
            'auth_api_token' => $data['token'] ?? null,
            'auth_user_id' => data_get($data, 'user.id'),
            'encore_user' => $data['user'] ?? [],
            'encore_user_roles' => $data['roles'] ?? [],
            'encore_user_permissions' => $data['permissions'] ?? [],
        ]);
    }
}
