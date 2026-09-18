<?php

namespace App\Http\Controllers;

use App\Services\Encore\EncoreSessionGuard;
use App\Services\Encore\ProfileApiService;
use RuntimeException;
use Throwable;

class EncoreProfileController extends Controller
{
    public function __construct(
        protected ProfileApiService $profile,
        protected EncoreSessionGuard $guard
    ) {
    }

    public function show()
    {
        if (!$this->isSignedIn()) {
            session(['url.intended' => route('profile')]);

            return redirect()
                ->route('login')
                ->with('error', 'Please sign in to view your account.');
        }

        $user = is_array(session('encore_user'))
            ? session('encore_user')
            : [];

        $customer = [];
        $summary = $this->emptySummary();
        $apiError = null;

        try {
            $customerResponse = $this->profile->customerDetails();

            if (!($customerResponse['success'] ?? false)) {
                throw new RuntimeException(
                    $customerResponse['message'] ?? 'Unable to load customer details.'
                );
            }

            $customer = $customerResponse['data'] ?? [];
            $customer = is_array($customer) ? $customer : (array) $customer;

            $customer = $this->mergeCheckoutDetailsIntoCustomer($customer);

            $summaryResponse = $this->profile->orderSummary();

            if ($summaryResponse['success'] ?? false) {
                $summaryData = $summaryResponse['data'] ?? [];
                $summaryData = is_array($summaryData) ? $summaryData : (array) $summaryData;

                $summary = array_merge(
                    $this->emptySummary(),
                    $summaryData
                );
            }
        } catch (Throwable $e) {
            $apiError = 'We could not load all account details right now.';
        }

        return view('shop.profile.index', [
            'user' => $user,
            'customer' => $customer,
            'summary' => $summary,
            'apiError' => $apiError,
        ]);
    }

    protected function isSignedIn(): bool
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

    protected function mergeCheckoutDetailsIntoCustomer(array $customer): array
    {
        $billing = session('encore_checkout_billing', []);

        if (!is_array($billing) || empty($billing)) {
            return $customer;
        }

        foreach ([
            'first_name',
            'last_name',
            'address',
            'street',
            'city',
            'state',
            'postal_code',
            'country',
            'country_id',
            'country_code',
        ] as $field) {
            if (array_key_exists($field, $billing) && $billing[$field] !== null) {
                $customer[$field] = $billing[$field];
            }
        }

        if (array_key_exists('phone', $billing)) {
            $customer['phone_number'] = $billing['phone'];
        }

        if (array_key_exists('email', $billing)) {
            $detail = data_get($customer, 'user_detail', []);
            $detail = is_array($detail) ? $detail : (array) $detail;
            $detail['email'] = $billing['email'];
            $customer['user_detail'] = $detail;
        }

        return $customer;
    }

    protected function emptySummary(): array
    {
        return [
            'totalOrders' => 0,
            'inPacking' => 0,
            'delivered' => 0,
            'refundAndCancel' => 0,
        ];
    }
}
