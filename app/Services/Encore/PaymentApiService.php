<?php

namespace App\Services\Encore;

class PaymentApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function paymentDetails(): array
    {
        return $this->api->get('v1/profile/get_payment_details');
    }

    public function updateBillingDetails(array $data): array
    {
        return $this->api->post('v1/profile/update_billing_details', $data);
    }
}
