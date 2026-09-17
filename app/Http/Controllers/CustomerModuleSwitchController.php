<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerModuleSwitchController extends Controller
{
    public function toShop(Request $request)
    {
        $request->session()->forget([
            'em_customer_id',
            'em_customer_name',
            'em_customer_account_type',
            'em_password_setup_customer_id',
            'em_password_setup_email',
            'em_url_intended',
        ]);

        $request->session()->put('customer_module_context', 'shop');
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Sign in to Shop to continue with your cart.');
    }
}
