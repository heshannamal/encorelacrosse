<?php

namespace App\Http\Controllers;

use App\Services\Encore\CartApiService;
use App\Services\Encore\CartMergeService;
use App\Services\Encore\EncoreSessionGuard;
use App\Services\Encore\OrderApiService;
use App\Services\Encore\PaymentApiService;
use App\Services\Encore\ProfileApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartApiService $cart,
        protected CartMergeService $merge,
        protected ProfileApiService $profile,
        protected PaymentApiService $payment,
        protected OrderApiService $orders,
        protected EncoreSessionGuard $guard
    ) {
    }

    public function index(Request $request)
    {
        if (!$this->ensureSignedIn()) {
            session(['url.intended' => route('checkout')]);
            return redirect()->route('login')->with('error', 'Please sign in before checkout.');
        }

        try {
            $merge = $this->merge->claimGuestCart();
            if (!($merge['success'] ?? false)) {
                return redirect()->route('cart')->with(
                    'error',
                    implode(' ', $merge['warnings'] ?? ['We could not prepare your cart for checkout.'])
                );
            }

            $idsResponse = $this->cart->authenticatedCartIds();
            $cartIds = collect($idsResponse['cart_item_ids'] ?? [])
                ->map(fn ($id) => (int) $id)
                ->filter()
                ->values();

            if ($cartIds->isEmpty()) {
                return redirect()->route('cart')->with('error', 'Your cart is empty.');
            }

            $customerResponse = $this->profile->customerDetails();
            $countriesResponse = $this->profile->countries();
            $paymentResponse = $this->payment->paymentDetails();

            if (!($paymentResponse['success'] ?? false)) {
                throw new \RuntimeException($paymentResponse['message'] ?? 'Unable to calculate checkout totals.');
            }

            return view('shop.checkout', [
                'cartIds' => $cartIds,
                'customer' => $customerResponse['data'] ?? [],
                'countries' => collect($countriesResponse['data'] ?? []),
                'payment' => data_get($paymentResponse, 'data.payment', []),
                'subPayment' => data_get($paymentResponse, 'data.sub_payment', []),
                'billing' => $request->session()->get('encore_checkout_billing', []),
                'billingSaved' => (bool) $request->session()->get('encore_billing_saved', false),
            ]);
        } catch (Throwable $e) {
            Log::error('Encore checkout page failed.', ['message' => $e->getMessage()]);
            return redirect()->route('cart')->with('error', 'We could not open checkout. Please try again.');
        }
    }

    public function paymentDetails()
    {
        if (!$this->ensureSignedIn()) {
            return response()->json([
                'success' => false,
                'requires_login' => true,
                'message' => 'Your session has expired. Please sign in again.',
                'login_url' => route('login'),
            ], 401);
        }

        try {
            return response()->json($this->payment->paymentDetails());
        } catch (Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'We could not calculate your order total. Please try again.',
            ], 500);
        }
    }

    public function saveBilling(Request $request)
    {
        if (!$this->ensureSignedIn()) {
            return response()->json([
                'success' => false,
                'requires_login' => true,
                'message' => 'Your session has expired. Please sign in again.',
                'login_url' => route('login'),
            ], 401);
        }

        $sameAsBilling = $request->boolean('use_same_as_billing_address');
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country_id' => ['required', 'integer'],
            'country' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
        ];

        if (!$sameAsBilling) {
            $rules = array_merge($rules, [
                'shipping_first_name' => ['required', 'string', 'max:255'],
                'shipping_last_name' => ['required', 'string', 'max:255'],
                'shipping_address' => ['required', 'string', 'max:255'],
                'shipping_street' => ['nullable', 'string', 'max:255'],
                'shipping_city' => ['required', 'string', 'max:255'],
                'shipping_state' => ['required', 'string', 'max:255'],
                'shipping_country_id' => ['required', 'integer'],
                'shipping_country' => ['nullable', 'string', 'max:255'],
                'shipping_postal_code' => ['required', 'string', 'max:50'],
                'shipping_phone' => ['required', 'string', 'max:50'],
                'shipping_email' => ['required', 'email', 'max:255'],
            ]);
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        try {
            $data = $validator->validated();
            $countriesResponse = $this->profile->countries();

            if (!($countriesResponse['success'] ?? false)) {
                return response()->json(['success' => false, 'message' => 'We could not load the selected country.'], 422);
            }

            $countries = collect($countriesResponse['data'] ?? []);
            $billingCountry = $countries->first(fn ($country) =>
                (string) data_get($country, 'id') === (string) $data['country_id']
            );

            if (!$billingCountry) {
                return response()->json(['success' => false, 'message' => 'Please select a valid country.'], 422);
            }

            $data['country'] = (string) data_get($billingCountry, 'name', '');
            $data['country_code'] = (string) data_get($billingCountry, 'code', '');

            $shippingCountry = null;
            if (!$sameAsBilling) {
                $shippingCountry = $countries->first(fn ($country) =>
                    (string) data_get($country, 'id') === (string) $data['shipping_country_id']
                );

                if (!$shippingCountry) {
                    return response()->json(['success' => false, 'message' => 'Please select a valid shipping country.'], 422);
                }

                $data['shipping_country'] = (string) data_get($shippingCountry, 'name', '');
                $data['shipping_country_code'] = (string) data_get($shippingCountry, 'code', '');
            }

            $userId = (int) data_get(session('encore_user'), 'id', session('auth_user_id'));
            if ($userId <= 0) {
                return response()->json([
                    'success' => false,
                    'requires_login' => true,
                    'message' => 'Please sign in again.',
                    'login_url' => route('login'),
                ], 401);
            }

            $data['user_id'] = $userId;
            $data['is_shipping_address_available'] = $sameAsBilling ? 0 : 1;
            $data['use_same_as_billing_address'] = $sameAsBilling ? 1 : 0;

            $cartIdsResponse = $this->cart->authenticatedCartIds();
            $cartIds = collect($cartIdsResponse['cart_item_ids'] ?? [])
                ->map(fn ($id) => (int) $id)
                ->filter()
                ->values();
            $data['cart_ids'] = json_encode($cartIds->all());

            $apiData = $data;
            unset(
                $apiData['country_id'],
                $apiData['country_code'],
                $apiData['shipping_country_id'],
                $apiData['shipping_country_code']
            );

            $saved = $this->payment->updateBillingDetails($apiData);
            if (!($saved['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $saved['message'] ?? 'Unable to save your details.',
                ], 422);
            }

            $returnedData = is_array($saved['data'] ?? null)
                ? array_filter($saved['data'], static fn ($value) => $value !== null)
                : [];

            $billing = array_merge($data, $returnedData);
            $billing['country_id'] = (int) data_get($billingCountry, 'id');
            $billing['country'] = (string) data_get($billingCountry, 'name', '');
            $billing['country_code'] = (string) data_get($billingCountry, 'code', '');

            if (!$sameAsBilling && $shippingCountry) {
                $billing['shipping_country_id'] = (int) data_get($shippingCountry, 'id');
                $billing['shipping_country'] = (string) data_get($shippingCountry, 'name', '');
                $billing['shipping_country_code'] = (string) data_get($shippingCountry, 'code', '');
            }

            $request->session()->put('encore_checkout_billing', $billing);
            $request->session()->put('encore_billing_saved', true);
            $request->session()->put('encore_temp_billing_detail_id', data_get($saved, 'data.id'));

            $totals = $this->payment->paymentDetails();
            if (!($totals['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $totals['message'] ?? 'Details were saved, but the order total could not be updated.',
                ], 422);
            }

            return response()->json([
                'success' => true,
                'message' => $saved['message'] ?? 'Billing and shipping details saved successfully.',
                'billing' => $billing,
                'temp_billing_detail_id' => data_get($saved, 'data.id'),
                'payment' => $totals['data'] ?? [],
            ]);
        } catch (Throwable $e) {
            Log::error('Encore billing save failed.', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'We could not save your details. Please try again.',
            ], 500);
        }
    }

    /**
     * Final payment uses a provider-issued payment token. The browser must not
     * post raw card data to this Laravel controller.
     */
    public function placeOrder(Request $request)
    {
        if (!$this->ensureSignedIn()) {
            return response()->json([
                'success' => false,
                'requires_login' => true,
                'message' => 'Your session has expired. Please sign in again.',
                'login_url' => route('login'),
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'payment_token' => ['required', 'string', 'max:2048'],
            'payment_method' => ['nullable', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'payment_setup_required' => true,
                'message' => 'A secure payment token is required to place the order.',
            ], 422);
        }

        try {
            if (!session('encore_billing_saved')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please save your billing and shipping details first.',
                ], 422);
            }

            $cartIdsResponse = $this->cart->authenticatedCartIds();
            $cartIds = collect($cartIdsResponse['cart_item_ids'] ?? [])
                ->map(fn ($id) => (int) $id)
                ->filter()
                ->values();

            if ($cartIds->isEmpty()) {
                return response()->json(['success' => false, 'message' => 'Your cart is empty.'], 422);
            }

            $totalsResponse = $this->payment->paymentDetails();
            if (!($totalsResponse['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $totalsResponse['message'] ?? 'Unable to calculate your order total.',
                ], 422);
            }

            $payment = data_get($totalsResponse, 'data.payment', []);
            $subPayment = data_get($totalsResponse, 'data.sub_payment', []);
            $validated = $validator->validated();

            $payload = [
                'cart_ids' => json_encode($cartIds->all()),
                'total_item_qty' => data_get($payment, 'total_item_qty', 0),
                'sub_total' => data_get($payment, 'sub_total', '0.00'),
                'shipping_fee' => data_get($subPayment, 'shipping_fee', '0.00'),
                'sales_tax' => data_get($subPayment, 'sales_tax', '0.00'),
                'invoice_total' => data_get($payment, 'invoice_total', '0.00'),
                'other_fee' => data_get($subPayment, 'other_fee', '0.00'),
                'balance_invoice' => data_get($payment, 'balance_invoice', data_get($payment, 'invoice_total', '0.00')),
                'processing_fee' => data_get($payment, 'processing_fee', '0.00'),
                'amount_to_pay' => data_get($payment, 'amount_to_pay', '0.00'),
                'temp_billing_detail_id' => session('encore_temp_billing_detail_id'),
                'payment_token' => $validated['payment_token'],
                'payment_method' => $validated['payment_method'] ?? null,
            ];

            $response = $this->orders->store($payload);
            unset($payload['payment_token']);

            if (!($response['success'] ?? false)) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'] ?? 'Payment could not be completed.',
                ], (int) ($response['_http_status'] ?? 422));
            }

            $request->session()->forget([
                'encore_checkout_billing',
                'encore_billing_saved',
                'encore_temp_billing_detail_id',
                'encore_cart_merge_pending',
            ]);
            $request->session()->put('encore_cart_temp_id', (string) Str::uuid());

            return response()->json([
                'success' => true,
                'message' => $response['message'] ?? 'Order placed successfully!',
                'redirect' => route('allProduct'),
            ]);
        } catch (Throwable $e) {
            Log::error('Encore place order failed.', ['message' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Payment could not be completed. Please try again.',
            ], 500);
        }
    }

    protected function ensureSignedIn(): bool
    {
        if (!session('encore_user_token') && !session('auth_api_token')) {
            return false;
        }

        try {
            return $this->guard->valid();
        } catch (Throwable $e) {
            return false;
        }
    }
}
