<?php

namespace App\Http\Controllers;

use App\Services\Encore\CartApiService;
use App\Services\Encore\CartMergeService;
use App\Services\Encore\EncoreSessionGuard;
use App\Services\Encore\ProductApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class CartController extends Controller
{
    public function __construct(
        protected CartApiService $cart,
        protected ProductApiService $products,
        protected CartMergeService $merge,
        protected EncoreSessionGuard $guard
    ) {
    }

    public function index()
    {
        try {
            $merge = $this->merge->retryIfPending();
            $payload = $this->cartPayload();
            $payload['warnings'] = $merge['warnings'] ?? [];

            return view('shop.cart', [
                'cartItems' => collect($payload['items'] ?? []),
                'subtotal' => (float) ($payload['subtotal'] ?? 0),
                'apiError' => null,
                'initialCartPayload' => $payload,
            ]);
        } catch (Throwable $e) {
            return view('shop.cart', [
                'cartItems' => collect(),
                'subtotal' => 0,
                'apiError' => $e->getMessage(),
                'initialCartPayload' => [
                    'success' => false,
                    'items' => [],
                    'subtotal' => 0,
                    'item_quantity' => 0,
                    'cart_count' => 0,
                    'warnings' => [],
                    'message' => $e->getMessage(),
                ],
            ]);
        }
    }

    public function data()
    {
        try {
            $merge = $this->merge->retryIfPending();
            $payload = $this->cartPayload();
            $payload['warnings'] = $merge['warnings'] ?? [];
            return response()->json($payload);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function count()
    {
        try {
            $response = $this->cart->count($this->tempId());
            return response()->json([
                'success' => (bool) ($response['success'] ?? false),
                'count' => (int) ($response['cart_count'] ?? 0),
            ]);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'count' => 0], 500);
        }
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'min:1'],
            'size_id' => ['required', 'integer', 'min:1'],
            'color_id' => ['nullable', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
            'buy_now' => ['nullable'],
        ]);

        try {
            $productId = (int) $validated['product_id'];
            $sizeId = (int) $validated['size_id'];
            $colorId = !empty($validated['color_id']) ? (int) $validated['color_id'] : null;
            $requestedQty = (int) $validated['quantity'];

            $stock = $this->products->stockForCombination($productId, $sizeId, $colorId);
            if ($stock <= 0) {
                return response()->json(['success' => false, 'message' => 'This option is out of stock.'], 422);
            }

            $items = $this->currentItems();
            $existingQty = (int) $items->filter(function ($item) use ($productId, $sizeId, $colorId) {
                return (int) $item['id'] === $productId
                    && (int) $item['size_id'] === $sizeId
                    && $item['color_id'] === $colorId;
            })->sum('quantity');

            if (($existingQty + $requestedQty) > $stock) {
                $remaining = max(0, $stock - $existingQty);
                return response()->json([
                    'success' => false,
                    'message' => $remaining > 0
                        ? 'Only ' . $remaining . ' more can be added for this option.'
                        : 'You already have the maximum available quantity in your cart.',
                ], 422);
            }

            $response = $this->cart->add([
                'temp_id' => $this->tempId(),
                'product_id' => $productId,
                'size_id' => $sizeId,
                'color_id' => $colorId,
                'quantity' => $requestedQty,
            ]);

            if (!($response['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Unable to add item.',
                ], 422);
            }

            return response()->json([
                'success' => true,
                'message' => 'Item added to your cart.',
                'redirect' => $request->boolean('buy_now') ? route('checkout') : route('cart'),
            ]);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function update(Request $request, $cartId)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        try {
            $item = $this->ownedItem((int) $cartId);
            if (!$item) {
                return response()->json(['success' => false, 'message' => 'Cart item not found.'], 404);
            }

            $quantity = (int) $validated['quantity'];
            if ($item['stock_qty'] > 0 && $quantity > $item['stock_qty']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient stock. Maximum available: ' . $item['stock_qty'],
                ], 422);
            }

            $response = $this->cart->update((int) $cartId, $quantity);
            if (!(($response['status'] ?? false) || ($response['success'] ?? false))) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Unable to update cart.',
                ], 422);
            }

            return response()->json($this->cartPayload('Cart updated.'));
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function remove($cartId)
    {
        try {
            if (!$this->ownedItem((int) $cartId)) {
                return response()->json(['success' => false, 'message' => 'Cart item not found.'], 404);
            }

            $response = $this->cart->remove((int) $cartId);
            if (!($response['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Unable to remove item.',
                ], 422);
            }

            return response()->json($this->cartPayload('Item removed from cart.'));
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function validateCheckout()
    {
        if (!session('encore_user_token')) {
            session(['url.intended' => route('checkout')]);

            return response()->json([
                'success' => false,
                'requires_login' => true,
                'message' => 'Please sign in before checkout.',
                'login_url' => route('login'),
            ], 401);
        }

        try {
            if (!$this->guard->valid()) {
                session(['url.intended' => route('checkout')]);

                return response()->json([
                    'success' => false,
                    'requires_login' => true,
                    'message' => 'Your session has expired. Please sign in again.',
                    'login_url' => route('login'),
                ], 401);
            }

            $merge = $this->merge->claimGuestCart();
            if (!($merge['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => implode(' ', $merge['warnings'] ?? ['Some cart items are still being linked to your account.']),
                ], 409);
            }

            $idResponse = $this->cart->authenticatedCartIds();
            $userIds = collect($idResponse['cart_item_ids'] ?? [])->map(fn ($id) => (int) $id);
            $items = $this->currentItems()
                ->filter(fn ($item) => $userIds->contains((int) $item['cart_id']))
                ->values();

            if ($items->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'Your cart is empty.'], 422);
            }

            foreach ($items as $item) {
                if ($item['stock_qty'] <= 0 || $item['quantity'] > $item['stock_qty']) {
                    return response()->json([
                        'success' => false,
                        'message' => $item['name'] . ' no longer has enough stock. Please update your cart.',
                    ], 422);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Cart validated.',
                'redirect' => route('checkout'),
            ]);
        } catch (Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    protected function cartPayload(?string $message = null): array
    {
        $items = $this->currentItems();
        $subtotal = round((float) $items->sum('line_total'), 2);
        $countResponse = $this->cart->count($this->tempId());

        return [
            'success' => true,
            'message' => $message,
            'items' => $items->values(),
            'subtotal' => $subtotal,
            'item_quantity' => (int) $items->sum('quantity'),
            'cart_count' => (int) ($countResponse['cart_count'] ?? $items->count()),
        ];
    }

    protected function currentItems()
    {
        $response = $this->cart->items($this->tempId());
        if (!($response['success'] ?? false)) {
            throw new RuntimeException($response['message'] ?? 'Unable to load cart.');
        }

        return collect($response['cart_items'] ?? [])
            ->map(fn ($item) => $this->products->normalizeCartItem($item))
            ->filter(fn ($item) => $item['cart_id'] > 0 && $item['id'] > 0)
            ->values();
    }

    protected function ownedItem(int $cartId): ?array
    {
        return $this->currentItems()->first(fn ($item) => (int) $item['cart_id'] === $cartId);
    }

    protected function tempId(): string
    {
        if (!session()->has('encore_cart_temp_id')) {
            session(['encore_cart_temp_id' => (string) Str::uuid()]);
        }

        return (string) session('encore_cart_temp_id');
    }
}
