<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureShopCustomerContext
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('em_customer_id')) {
            return response()->view('shop.auth.switch-from-training', [
                'continueUrl' => route('customer.module.switch.shop'),
                'cancelUrl' => route('home'),
            ]);
        }

        return $next($request);
    }
}
