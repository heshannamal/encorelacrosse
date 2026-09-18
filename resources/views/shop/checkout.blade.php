@extends('layouts.app')

@section('title', 'Checkout | Encore Lacrosse Apparel')

@section('content')
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')
@php
    $customer = is_array($customer ?? null) ? $customer : [];
    $billing = is_array($billing ?? null) ? $billing : [];
    $payment = is_array($payment ?? null) ? $payment : [];
    $subPayment = is_array($subPayment ?? null) ? $subPayment : [];
    $countries = isset($countries) ? collect($countries) : collect();
    $billingSaved = (bool) ($billingSaved ?? false);
    $months = is_array($months ?? null) ? $months : [1=>'01',2=>'02',3=>'03',4=>'04',5=>'05',6=>'06',7=>'07',8=>'08',9=>'09',10=>'10',11=>'11',12=>'12'];
    $checkoutValue = fn(string $field, $fallback = '') => old($field, array_key_exists($field, $billing) ? $billing[$field] : $fallback);
    $sameAsBilling = array_key_exists('is_shipping_address_available', $billing) ? (int)data_get($billing, 'is_shipping_address_available') === 0 : true;
    $selectedBillingCountryId = (string)$checkoutValue('country_id', data_get($customer, 'country_id', ''));
    $selectedShippingCountryId = (string)$checkoutValue('shipping_country_id', '');
@endphp

<style>
.ec-payment-card{margin-top:18px}
.ec-payment-card-types{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
.ec-card-type-input{position:absolute;opacity:0;pointer-events:none}
.ec-card-type-label{min-height:64px;display:flex;align-items:center;justify-content:center;padding:8px 14px;border:1px solid #d8d8d8;border-radius:8px;background:#fff;cursor:pointer;transition:.2s ease}
.ec-card-type-label:hover{border-color:#aaa;transform:translateY(-1px)}
.ec-card-type-input:checked+.ec-card-type-label{border-color:#222;box-shadow:0 0 0 2px #222 inset;background:#f8f8f8}
.ec-card-type-logo{width:100%;max-width:96px;height:38px;display:block;object-fit:contain;pointer-events:none}
.ec-card-number-wrap{position:relative}
.ec-card-number-wrap .ec-input{padding-right:82px}
.ec-card-brand{position:absolute;right:12px;top:50%;width:58px;height:26px;transform:translateY(-50%);object-fit:contain;pointer-events:none}
.ec-payment-grid{display:grid;grid-template-columns:minmax(0,1fr) 120px;gap:12px}
.ec-payment-help{margin-top:8px;color:#888;font-size:11px;line-height:1.55}
.ec-payment-error{width:100%;margin:14px 0 0}
.ec-payment-lock{color:#1f9d62;font-size:18px}
@media(max-width:767.98px){.ec-payment-card-types{grid-template-columns:1fr}.ec-payment-grid{grid-template-columns:1fr}}
</style>

<div class="ec-shop"><div class="ec-shop-shell">
    @include('shop.ecommerce._flash')
    <header class="ec-page-heading"><div><div class="ec-shop-kicker">Secure Checkout</div><h1 class="ec-shop-title">Checkout</h1><p class="ec-shop-subtitle">Save billing and shipping details, then complete payment securely.</p></div><a href="{{ route('cart') }}" class="ec-btn ec-btn-light"><i class="bi bi-arrow-left"></i> Back to Cart</a></header>

    <div class="ec-two-col">
        <div>
            <section class="ec-card"><div class="ec-card-head"><h2 class="ec-card-title">Billing & Shipping</h2><span id="ecBillingSavedBadge" style="display:{{ $billingSaved ? 'inline' : 'none' }};color:#1f7951;font-size:11px;font-weight:700">Saved</span></div><div class="ec-card-body">
                <form id="ecBillingForm">@csrf
                    <div class="ec-check-section"><h3 class="ec-check-title">Billing Details</h3><div class="ec-grid-2">
                        <div><label class="ec-label">First Name</label><input class="ec-input" name="first_name" value="{{ $checkoutValue('first_name', data_get($customer, 'first_name')) }}" required></div>
                        <div><label class="ec-label">Last Name</label><input class="ec-input" name="last_name" value="{{ $checkoutValue('last_name', data_get($customer, 'last_name')) }}" required></div>
                        <div style="grid-column:1/-1"><label class="ec-label">Address</label><input class="ec-input" name="address" value="{{ $checkoutValue('address', data_get($customer, 'address')) }}" required></div>
                        <div style="grid-column:1/-1"><label class="ec-label">Street / Suite</label><input class="ec-input" name="street" value="{{ $checkoutValue('street', data_get($customer, 'street')) }}"></div>
                        <div><label class="ec-label">City</label><input class="ec-input" name="city" value="{{ $checkoutValue('city', data_get($customer, 'city')) }}" required></div>
                        <div><label class="ec-label">State</label><input class="ec-input" name="state" value="{{ $checkoutValue('state', data_get($customer, 'state')) }}" required></div>
                        <div><label class="ec-label">Country</label><select class="ec-select" name="country_id" id="ecBillingCountry" required><option value="">Select Country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" data-country-name="{{ data_get($country,'name') }}" {{ $selectedBillingCountryId === (string)data_get($country,'id') ? 'selected' : '' }}>{{ data_get($country,'name') }}</option>@endforeach</select><input type="hidden" name="country" id="ecBillingCountryName" value="{{ $checkoutValue('country') }}"></div>
                        <div><label class="ec-label">Postal Code</label><input class="ec-input" name="postal_code" value="{{ $checkoutValue('postal_code', data_get($customer, 'postal_code')) }}" required></div>
                        <div><label class="ec-label">Phone</label><input class="ec-input" name="phone" value="{{ $checkoutValue('phone', data_get($customer, 'phone_number')) }}" required></div>
                        <div><label class="ec-label">Email</label><input class="ec-input" type="email" name="email" value="{{ $checkoutValue('email', data_get(session('encore_user'), 'email')) }}" required></div>
                    </div><label class="ec-check-line"><input type="checkbox" name="use_same_as_billing_address" value="1" id="ecSameAddress" {{ $sameAsBilling ? 'checked' : '' }}> Use billing address as shipping address</label></div>

                    <div class="ec-check-section" id="ecShippingSection" {{ $sameAsBilling ? 'hidden' : '' }}><h3 class="ec-check-title">Shipping Address</h3><div class="ec-grid-2">
                        <div><label class="ec-label">First Name</label><input class="ec-input ec-ship-required" name="shipping_first_name" value="{{ $checkoutValue('shipping_first_name') }}"></div>
                        <div><label class="ec-label">Last Name</label><input class="ec-input ec-ship-required" name="shipping_last_name" value="{{ $checkoutValue('shipping_last_name') }}"></div>
                        <div style="grid-column:1/-1"><label class="ec-label">Address</label><input class="ec-input ec-ship-required" name="shipping_address" value="{{ $checkoutValue('shipping_address') }}"></div>
                        <div style="grid-column:1/-1"><label class="ec-label">Street / Suite</label><input class="ec-input" name="shipping_street" value="{{ $checkoutValue('shipping_street') }}"></div>
                        <div><label class="ec-label">City</label><input class="ec-input ec-ship-required" name="shipping_city" value="{{ $checkoutValue('shipping_city') }}"></div>
                        <div><label class="ec-label">State</label><input class="ec-input ec-ship-required" name="shipping_state" value="{{ $checkoutValue('shipping_state') }}"></div>
                        <div><label class="ec-label">Country</label><select class="ec-select ec-ship-required" name="shipping_country_id" id="ecShippingCountry"><option value="">Select Country</option>@foreach($countries as $country)<option value="{{ data_get($country,'id') }}" data-country-name="{{ data_get($country,'name') }}" {{ $selectedShippingCountryId === (string)data_get($country,'id') ? 'selected' : '' }}>{{ data_get($country,'name') }}</option>@endforeach</select><input type="hidden" name="shipping_country" id="ecShippingCountryName" value="{{ $checkoutValue('shipping_country') }}"></div>
                        <div><label class="ec-label">Postal Code</label><input class="ec-input ec-ship-required" name="shipping_postal_code" value="{{ $checkoutValue('shipping_postal_code') }}"></div>
                        <div><label class="ec-label">Phone</label><input class="ec-input ec-ship-required" name="shipping_phone" value="{{ $checkoutValue('shipping_phone') }}"></div>
                        <div><label class="ec-label">Email</label><input class="ec-input ec-ship-required" type="email" name="shipping_email" value="{{ $checkoutValue('shipping_email') }}"></div>
                    </div></div>
                    <div id="ecBillingError" class="ec-shop-message ec-shop-message-error" style="display:none;width:100%;margin:15px 0 0"></div>
                    <button type="submit" class="ec-btn ec-btn-dark" id="ecBillingButton" style="margin-top:20px"><i class="bi bi-check2-circle"></i> Save & Recalculate</button>
                </form>
            </div></section>

            <section class="ec-card" style="margin-top:18px"><div class="ec-card-head"><h2 class="ec-card-title">Payment</h2><i class="bi bi-shield-lock"></i></div><div class="ec-card-body">
                <div class="ec-payment-pending"><strong>Secure payment field connection required.</strong><br>The cart, customer login, billing, shipping and order totals are connected. To finish the final charge, connect your payment provider's hosted/tokenized card field and submit its token as <code>payment_token</code>.</div>
                <form id="ecPaymentTokenForm" style="margin-top:15px;display:none">@csrf<input type="hidden" name="payment_token" id="ecPaymentToken"><input type="hidden" name="payment_method" id="ecPaymentMethod"><button type="submit" id="ecPayButton" class="ec-btn ec-btn-red ec-btn-full">Confirm & Pay</button></form>
            </div></section>
        </div>

        <aside class="ec-summary"><h2>Payment Summary</h2><div class="ec-summary-line"><span>Items</span><strong id="sumQty">{{ data_get($payment,'total_item_qty',0) }}</strong></div><div class="ec-summary-line"><span>Subtotal</span><strong id="sumSubtotal">${{ data_get($payment,'sub_total','0.00') }}</strong></div><div class="ec-summary-line"><span>Sales Tax</span><strong id="sumTax">${{ data_get($subPayment,'sales_tax','0.00') }}</strong></div><div class="ec-summary-line"><span>Shipping</span><strong id="sumShipping">${{ data_get($subPayment,'shipping_fee','0.00') }}</strong></div><div class="ec-summary-line"><span>Processing Fee</span><strong id="sumProcessing">${{ data_get($payment,'processing_fee','0.00') }}</strong></div><div class="ec-summary-line ec-summary-total"><span>Total</span><strong id="sumTotal">${{ data_get($payment,'amount_to_pay','0.00') }}</strong></div></aside>
    </div>
</div></div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    const form=document.getElementById('ecBillingForm'),same=document.getElementById('ecSameAddress'),shipping=document.getElementById('ecShippingSection'),button=document.getElementById('ecBillingButton'),error=document.getElementById('ecBillingError'),badge=document.getElementById('ecBillingSavedBadge'),billingCountry=document.getElementById('ecBillingCountry'),shippingCountry=document.getElementById('ecShippingCountry');
    function toggleShipping(){const show=!same.checked;shipping.hidden=!show;shipping.querySelectorAll('.ec-ship-required').forEach(input=>input.required=show)}
    function syncCountries(){const b=billingCountry.options[billingCountry.selectedIndex];document.getElementById('ecBillingCountryName').value=b?.dataset?.countryName||'';const s=shippingCountry.options[shippingCountry.selectedIndex];document.getElementById('ecShippingCountryName').value=s?.dataset?.countryName||''}
    function updateSummary(data){const p=data.payment||{},s=data.sub_payment||{};document.getElementById('sumQty').textContent=p.total_item_qty??0;document.getElementById('sumSubtotal').textContent='$'+(p.sub_total??'0.00');document.getElementById('sumTax').textContent='$'+(s.sales_tax??'0.00');document.getElementById('sumShipping').textContent='$'+(s.shipping_fee??'0.00');document.getElementById('sumProcessing').textContent='$'+(p.processing_fee??'0.00');document.getElementById('sumTotal').textContent='$'+(p.amount_to_pay??'0.00')}
    same.addEventListener('change',toggleShipping);billingCountry.addEventListener('change',syncCountries);shippingCountry.addEventListener('change',syncCountries);syncCountries();toggleShipping();
    form.addEventListener('submit',async function(event){event.preventDefault();error.style.display='none';syncCountries();if(!form.reportValidity())return;EncoreShopUI.buttonLoading(button,true,'Saving');EncoreShopUI.showLoader('Updating checkout');try{const response=await fetch(@json(route('checkout.billing')),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':form.querySelector('[name="_token"]').value},body:new FormData(form)});const data=await EncoreShopUI.json(response);if(data.requires_login){window.location.href=data.login_url;return}if(!data.success)throw new Error(data.message||'Unable to save details.');updateSummary(data.payment||{});badge.style.display='inline';EncoreShopUI.toast(data.message||'Details saved.','success')}catch(e){error.textContent=e.message;error.style.display='block';EncoreShopUI.toast(e.message,'error')}finally{EncoreShopUI.buttonLoading(button,false);EncoreShopUI.hideLoader()}});

    // A payment provider integration can dispatch this event after tokenization.
    window.addEventListener('encore:payment-token',function(event){const detail=event.detail||{};if(!detail.token)return;document.getElementById('ecPaymentToken').value=detail.token;document.getElementById('ecPaymentMethod').value=detail.method||'';document.getElementById('ecPaymentTokenForm').style.display='block'});
    document.getElementById('ecPaymentTokenForm').addEventListener('submit',async function(event){event.preventDefault();const payButton=document.getElementById('ecPayButton');EncoreShopUI.buttonLoading(payButton,true,'Processing');EncoreShopUI.showLoader('Processing payment');try{const data=await EncoreShopUI.json(await fetch(@json(route('checkout.place')),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':event.currentTarget.querySelector('[name="_token"]').value},body:new FormData(event.currentTarget)}));if(!data.success)throw new Error(data.message||'Payment could not be completed.');EncoreShopUI.toast(data.message||'Order placed.','success');setTimeout(()=>window.location.href=data.redirect||@json(route('allProduct')),300)}catch(e){EncoreShopUI.toast(e.message,'error')}finally{EncoreShopUI.buttonLoading(payButton,false);EncoreShopUI.hideLoader()}});
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
