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
    $checkoutValue = fn(string $field, $fallback = '') => old($field, array_key_exists($field, $billing) ? $billing[$field] : $fallback);
    $sameAsBilling = array_key_exists('is_shipping_address_available', $billing) ? (int)data_get($billing, 'is_shipping_address_available') === 0 : true;
    $selectedBillingCountryId = (string)$checkoutValue('country_id', data_get($customer, 'country_id', ''));
    $selectedShippingCountryId = (string)$checkoutValue('shipping_country_id', '');
@endphp

<div class="ec-shop"><div class="ec-shop-shell">
    @include('shop.ecommerce._flash')
    <header class="ec-page-heading"><div><div class="ec-shop-kicker">Checkout</div><h1 class="ec-shop-title">Checkout</h1><p class="ec-shop-subtitle">Save billing and shipping details and review your order totals.</p></div><a href="{{ route('cart') }}" class="ec-btn ec-btn-light"><i class="bi bi-arrow-left"></i> Back to Cart</a></header>

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

});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
