<?php

namespace App\Services\Encore;

class CartApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function count(string $tempId): array
    {
        return $this->api->post('v1/get_global_cart_count', ['temp_id' => $tempId]);
    }

    public function items(string $tempId): array
    {
        return $this->api->post('v1/get_cart_items', ['temp_id' => $tempId]);
    }

    public function globalItems(string $tempId): array
    {
        return $this->api->post('v1/global_cart_items', ['temp_id' => $tempId]);
    }

    public function add(array $data): array
    {
        return $this->api->post('v1/add_to_cart', $data);
    }

    public function getById(int $cartId): array
    {
        return $this->api->get('v1/get_cart_item_by_id/' . $cartId);
    }

    public function update(int $cartId, int $quantity): array
    {
        return $this->api->post('v1/update_cart/' . $cartId, ['quantity' => $quantity]);
    }

    public function updateById(int $cartId, array $data): array
    {
        return $this->api->post('v1/update_cart_by_id/' . $cartId, $data);
    }

    public function remove(int $cartId): array
    {
        return $this->api->get('v1/remove_cart_item_by_id/' . $cartId);
    }

    public function authenticatedCartIds(): array
    {
        return $this->api->get('v1/profile/get_cart_item_ids');
    }
}
