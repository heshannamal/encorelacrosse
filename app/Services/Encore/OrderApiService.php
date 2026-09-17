<?php

namespace App\Services\Encore;

class OrderApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function order(int $id): array
    {
        return $this->api->get('v1/orders/get_customer_order_by_id/' . $id);
    }

    public function receipt(int $id): array
    {
        return $this->api->get('v1/orders/get_receipt_details/' . $id);
    }

    public function store(array $data): array
    {
        return $this->api->post('v1/orders/store', $data);
    }
}
