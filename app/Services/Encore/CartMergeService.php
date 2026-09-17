<?php

namespace App\Services\Encore;

use Illuminate\Support\Str;
use Throwable;

class CartMergeService
{
    public function __construct(
        protected CartApiService $cart,
        protected ProductApiService $products
    ) {
    }

    public function claimGuestCart(): array
    {
        if (!session('encore_user_token') || !data_get(session('encore_user'), 'id')) {
            return ['success' => true, 'warnings' => []];
        }

        $oldTempId = $this->tempId();
        $allResponse = $this->cart->items($oldTempId);
        $idResponse = $this->cart->authenticatedCartIds();

        if (!($allResponse['success'] ?? false) || !($idResponse['success'] ?? false)) {
            return [
                'success' => false,
                'warnings' => ['Your guest cart could not be linked yet. Please retry from the cart page.'],
            ];
        }

        $rawItems = collect($allResponse['cart_items'] ?? []);
        $userIds = collect($idResponse['cart_item_ids'] ?? [])->map(fn ($id) => (int) $id);

        $guestRows = $rawItems->filter(function ($item) use ($userIds) {
            $cartId = (int) data_get($item, 'cart_id', 0);
            return $cartId > 0 && !$userIds->contains($cartId);
        })->values();

        if ($guestRows->isEmpty()) {
            session()->forget('encore_cart_merge_pending');
            return ['success' => true, 'warnings' => []];
        }

        $newTempId = (string) Str::uuid();
        $warnings = [];
        $failed = false;

        $userResponse = $this->cart->items($newTempId);
        $userRows = collect($userResponse['cart_items'] ?? [])
            ->filter(fn ($item) => $userIds->contains((int) data_get($item, 'cart_id', 0)))
            ->values();

        foreach ($guestRows as $guest) {
            try {
                $productId = (int) (data_get($guest, 'id') ?: data_get($guest, 'sub_product_id'));
                $sizeId = (int) (data_get($guest, 'selected_size.id') ?: data_get($guest, 'size_id'));
                $colorRaw = data_get($guest, 'selected_color.id', data_get($guest, 'color_id'));
                $colorId = ($colorRaw === null || $colorRaw === '') ? null : (int) $colorRaw;
                $guestQty = max(1, (int) (data_get($guest, 'cart_qty') ?: data_get($guest, 'quantity', 1)));
                $guestCartId = (int) data_get($guest, 'cart_id');

                if (!$productId || !$sizeId || !$guestCartId) {
                    $failed = true;
                    continue;
                }

                $stock = $this->products->stockForCombination($productId, $sizeId, $colorId);
                $existingQty = (int) $userRows->filter(function ($row) use ($productId, $sizeId, $colorId) {
                    $rowProduct = (int) (data_get($row, 'id') ?: data_get($row, 'sub_product_id'));
                    $rowSize = (int) (data_get($row, 'selected_size.id') ?: data_get($row, 'size_id'));
                    $rowColorRaw = data_get($row, 'selected_color.id', data_get($row, 'color_id'));
                    $rowColor = ($rowColorRaw === null || $rowColorRaw === '') ? null : (int) $rowColorRaw;
                    return $rowProduct === $productId && $rowSize === $sizeId && $rowColor === $colorId;
                })->sum(fn ($row) => (int) (data_get($row, 'cart_qty') ?: data_get($row, 'quantity', 1)));

                $availableToAdd = max(0, $stock - $existingQty);
                $qtyToAdd = min($guestQty, $availableToAdd);

                if ($qtyToAdd > 0) {
                    $added = $this->cart->add([
                        'temp_id' => $newTempId,
                        'product_id' => $productId,
                        'size_id' => $sizeId,
                        'color_id' => $colorId,
                        'quantity' => $qtyToAdd,
                    ]);

                    if (!($added['success'] ?? false)) {
                        $failed = true;
                        continue;
                    }
                }

                $removed = $this->cart->remove($guestCartId);
                if (!($removed['success'] ?? false)) {
                    $failed = true;
                    continue;
                }

                if ($qtyToAdd < $guestQty) {
                    $warnings[] = 'One cart item quantity was adjusted to currently available stock.';
                }
            } catch (Throwable $e) {
                $failed = true;
            }
        }

        if ($failed) {
            session(['encore_cart_merge_pending' => true]);
            $warnings[] = 'Some guest cart items are still being linked to your account. Open the cart to retry.';
        } else {
            session([
                'encore_cart_temp_id' => $newTempId,
                'encore_cart_merge_pending' => false,
            ]);
        }

        return ['success' => !$failed, 'warnings' => array_values(array_unique($warnings))];
    }

    public function retryIfPending(): array
    {
        return session('encore_cart_merge_pending')
            ? $this->claimGuestCart()
            : ['success' => true, 'warnings' => []];
    }

    protected function tempId(): string
    {
        if (!session()->has('encore_cart_temp_id')) {
            session(['encore_cart_temp_id' => (string) Str::uuid()]);
        }

        return (string) session('encore_cart_temp_id');
    }
}
