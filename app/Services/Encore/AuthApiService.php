<?php

namespace App\Services\Encore;

class AuthApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function login(string $email, string $password): array
    {
        return $this->api->post('v1/auth/login', [
            'email' => $email,
            'password' => $password,
            'device_name' => 'encore_lacrosse_web',
        ], false);
    }

    public function register(array $data): array
    {
        return $this->api->post('v1/auth/register', array_merge($data, [
            'device_name' => 'encore_lacrosse_web',
        ]), false);
    }

    public function socialLogin(array $data): array
    {
        return $this->api->post('v1/auth/social-login', array_merge($data, [
            'device_name' => 'encore_lacrosse_google',
        ]), false);
    }

    public function logout(): array
    {
        return $this->api->post('v1/auth/logout', [], false);
    }

    public function me(): array
    {
        return $this->api->get('v1/auth/me', [], false);
    }
}
