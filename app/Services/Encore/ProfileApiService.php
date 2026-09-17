<?php

namespace App\Services\Encore;

class ProfileApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function countries(): array
    {
        return $this->api->get('v1/get_countries');
    }

    public function customerDetails(): array
    {
        return $this->api->get('v1/profile/get_customer_details');
    }

    public function orderSummary(): array
    {
        return $this->api->get('v1/profile/order_summary');
    }

    public function orderHistory(): array
    {
        return $this->api->get('v1/profile/order_history');
    }

    public function updateProfile(array $data): array
    {
        return $this->api->post('v1/profile/update_profile', $data);
    }

    public function orderPaymentDetails(): array
    {
        return $this->api->get('v1/profile/get_order_payment_details');
    }
}
