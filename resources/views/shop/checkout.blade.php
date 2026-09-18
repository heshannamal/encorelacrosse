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
.ec-payment-card-types{display:flex;align-items:center;flex-wrap:wrap;gap:14px;margin-top:7px}
.ec-card-type-input{position:absolute;opacity:0;pointer-events:none}
.ec-card-type-label{min-height:28px;display:inline-flex;align-items:center;justify-content:center;padding:0;border:0;border-radius:0;background:transparent;cursor:pointer;transition:opacity .18s ease,transform .18s ease}
.ec-card-type-label:hover{opacity:.72;transform:translateY(-1px)}
.ec-card-type-input:checked+.ec-card-type-label{border:0;box-shadow:none;background:transparent;opacity:1}
.ec-card-type-input:not(:checked)+.ec-card-type-label{opacity:.7}
.ec-card-type-logo{width:auto;height:22px;display:block;object-fit:contain;filter:grayscale(1);pointer-events:none}
.ec-card-number-wrap{position:relative}
.ec-card-number-wrap .ec-input{padding-right:82px}
.ec-card-brand{position:absolute;right:12px;top:50%;width:58px;height:26px;transform:translateY(-50%);object-fit:contain;pointer-events:none}
.ec-payment-grid{display:grid;grid-template-columns:minmax(0,1fr) 120px;gap:12px}
.ec-payment-help{margin-top:8px;color:#888;font-size:11px;line-height:1.55}
.ec-payment-error{width:100%;margin:14px 0 0}
.ec-payment-lock{color:#1f9d62;font-size:18px}
@media(max-width:767.98px){.ec-payment-card-types{gap:12px}.ec-payment-grid{grid-template-columns:1fr}}
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

            <section class="ec-card ec-payment-card">
                <div class="ec-card-head">
                    <div>
                        <h2 class="ec-card-title">Card Payment</h2>
                        <div style="margin-top:3px;color:#888;font-size:11px;">Enter your card details to complete the order.</div>
                    </div>
                    <i class="bi bi-lock-fill ec-payment-lock" aria-hidden="true"></i>
                </div>
                <div class="ec-card-body">
                    <form id="ecCardForm">@csrf
                        <div>
                            <label class="ec-label">Accepted Cards</label>
                            <div class="ec-payment-card-types">
                                <div>
                                    <input class="ec-card-type-input" type="radio" id="ecCardVisa" name="card_type" value="1" required>
                                    <label for="ecCardVisa" class="ec-card-type-label" title="Visa">
                                        <img src="{{ asset('images/payment/visa.svg') }}" alt="Visa" class="ec-card-type-logo">
                                    </label>
                                </div>
                                <div>
                                    <input class="ec-card-type-input" type="radio" id="ecCardMaster" name="card_type" value="2" required>
                                    <label for="ecCardMaster" class="ec-card-type-label" title="Mastercard">
                                        <img src="{{ asset('images/payment/mastercard.svg') }}" alt="Mastercard" class="ec-card-type-logo">
                                    </label>
                                </div>
                                <div>
                                    <input class="ec-card-type-input" type="radio" id="ecCardAmex" name="card_type" value="3" required>
                                    <label for="ecCardAmex" class="ec-card-type-label" title="American Express">
                                        <img src="{{ asset('images/payment/amex.svg') }}" alt="American Express" class="ec-card-type-logo">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:15px">
                            <label class="ec-label" for="ecCardHolder">Name on Card</label>
                            <input class="ec-input" id="ecCardHolder" name="card_holder_name" placeholder="Name shown on card" autocomplete="cc-name" required>
                        </div>

                        <div style="margin-top:15px">
                            <label class="ec-label" for="ecCardNumber">Card Number</label>
                            <div class="ec-card-number-wrap">
                                <input class="ec-input" id="ecCardNumber" name="card_number" inputmode="numeric" autocomplete="cc-number" placeholder="0000 0000 0000 0000" maxlength="23" required>
                                <img class="ec-card-brand" id="ecCardBrand" src="" alt="" hidden>
                            </div>
                        </div>

                        <div class="ec-payment-grid" style="margin-top:15px">
                            <div>
                                <label class="ec-label">Expiration</label>
                                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                                    <select class="ec-select" id="ecCardMonth" name="card_expiry_month" autocomplete="cc-exp-month" required>
                                        <option value="">MM</option>
                                        @foreach($months as $key => $month)
                                            <option value="{{ $key }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                    <select class="ec-select" id="ecCardYear" name="card_expiry_year" autocomplete="cc-exp-year" required>
                                        <option value="">YYYY</option>
                                        @for($year = date('Y'); $year <= date('Y') + 15; $year++)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="ec-label" for="ecCardCode">CVV</label>
                                <input class="ec-input" type="password" id="ecCardCode" name="card_csv" inputmode="numeric" autocomplete="cc-csc" placeholder="CVV" maxlength="4" required>
                            </div>
                        </div>

                        <div class="ec-payment-help">Your payment is processed when you confirm the order.</div>
                        <div id="ecPaymentError" class="ec-shop-message ec-shop-message-error ec-payment-error" style="display:none"></div>
                        <button type="submit" class="ec-btn ec-btn-red ec-btn-full" id="ecPayButton" style="margin-top:18px">
                            <i class="bi bi-lock-fill"></i> Confirm & Pay
                        </button>
                    </form>
                </div>
            </section>
        </div>

        <aside class="ec-summary"><h2>Payment Summary</h2><div class="ec-summary-line"><span>Items</span><strong id="sumQty">{{ data_get($payment,'total_item_qty',0) }}</strong></div><div class="ec-summary-line"><span>Subtotal</span><strong id="sumSubtotal">${{ data_get($payment,'sub_total','0.00') }}</strong></div><div class="ec-summary-line"><span>Sales Tax</span><strong id="sumTax">${{ data_get($subPayment,'sales_tax','0.00') }}</strong></div><div class="ec-summary-line"><span>Shipping</span><strong id="sumShipping">${{ data_get($subPayment,'shipping_fee','0.00') }}</strong></div><div class="ec-summary-line"><span>Processing Fee</span><strong id="sumProcessing">${{ data_get($payment,'processing_fee','0.00') }}</strong></div><div class="ec-summary-line ec-summary-total"><span>Total</span><strong id="sumTotal">${{ data_get($payment,'amount_to_pay','0.00') }}</strong></div></aside>
    </div>
</div></div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    const billingForm=document.getElementById('ecBillingForm');
    const cardForm=document.getElementById('ecCardForm');
    const sameAddress=document.getElementById('ecSameAddress');
    const shippingSection=document.getElementById('ecShippingSection');
    const billingButton=document.getElementById('ecBillingButton');
    const payButton=document.getElementById('ecPayButton');
    const billingError=document.getElementById('ecBillingError');
    const paymentError=document.getElementById('ecPaymentError');
    const savedBadge=document.getElementById('ecBillingSavedBadge');
    const cardNumber=document.getElementById('ecCardNumber');
    const cardCode=document.getElementById('ecCardCode');
    const cardBrand=document.getElementById('ecCardBrand');
    const billingCountry=document.getElementById('ecBillingCountry');
    const billingCountryName=document.getElementById('ecBillingCountryName');
    const shippingCountry=document.getElementById('ecShippingCountry');
    const shippingCountryName=document.getElementById('ecShippingCountryName');

    const csrf=@json(csrf_token());
    const billingUrl=@json(route('checkout.billing'));
    const placeOrderUrl=@json(route('checkout.place'));
    const loginUrl=@json(route('login'));
    const successUrl=@json(route('shop.mens-tops'));

    const cardBrandImages={
        1:@json(asset('images/payment/visa.svg')),
        2:@json(asset('images/payment/mastercard.svg')),
        3:@json(asset('images/payment/amex.svg'))
    };

    let billingSaved=@json($billingSaved);
    let billingDirty=!billingSaved;
    let paymentBusy=false;

    function clearError(element){
        if(!element)return;
        element.style.display='none';
        element.textContent='';
    }

    function showError(element,message){
        if(!element)return;
        element.textContent=message;
        element.style.display='block';
    }

    function setBillingSaved(saved){
        billingSaved=saved;
        if(savedBadge)savedBadge.style.display=saved?'inline':'none';
    }

    function markBillingDirty(){
        billingDirty=true;
        setBillingSaved(false);
    }

    function syncCountryNames(){
        if(billingCountry&&billingCountryName){
            const option=billingCountry.options[billingCountry.selectedIndex];
            billingCountryName.value=(option&&option.dataset)?(option.dataset.countryName||''):'';
        }

        if(shippingCountry&&shippingCountryName){
            const option=shippingCountry.options[shippingCountry.selectedIndex];
            shippingCountryName.value=(option&&option.dataset)?(option.dataset.countryName||''):'';
        }
    }

    function toggleShipping(){
        const show=!sameAddress.checked;
        shippingSection.hidden=!show;
        shippingSection.querySelectorAll('.ec-ship-required').forEach(function(input){
            input.required=show;
        });
    }

    function updateSummary(payload){
        const currentPayment=(payload&&payload.payment)?payload.payment:{};
        const currentSubPayment=(payload&&payload.sub_payment)?payload.sub_payment:{};

        document.getElementById('sumQty').textContent=currentPayment.total_item_qty??0;
        document.getElementById('sumSubtotal').textContent='$'+(currentPayment.sub_total??'0.00');
        document.getElementById('sumTax').textContent='$'+(currentSubPayment.sales_tax??'0.00');
        document.getElementById('sumShipping').textContent='$'+(currentSubPayment.shipping_fee??'0.00');
        document.getElementById('sumProcessing').textContent='$'+(currentPayment.processing_fee??'0.00');
        document.getElementById('sumTotal').textContent='$'+(currentPayment.amount_to_pay??'0.00');
    }

    function applySavedBilling(savedBilling){
        if(!savedBilling||typeof savedBilling!=='object')return;

        Object.entries(savedBilling).forEach(function(entry){
            const name=entry[0];
            const value=entry[1];
            const input=billingForm.elements.namedItem(name);

            if(!input||input.type==='checkbox')return;

            if(value!==null&&value!==undefined){
                input.value=value;
            }
        });

        sameAddress.checked=Number(savedBilling.is_shipping_address_available??0)===0;
        syncCountryNames();
        toggleShipping();
    }

    async function saveBilling(options){
        options=options||{};
        const showToast=options.showToast!==false;
        const showLoader=options.showLoader===true;

        clearError(billingError);
        syncCountryNames();

        if(!billingForm.reportValidity()){
            throw new Error('Please complete the required billing and shipping fields.');
        }

        if(showLoader){
            EncoreShopUI.showLoader('Updating checkout');
        }

        EncoreShopUI.buttonLoading(billingButton,true,'Saving');

        try{
            const response=await fetch(billingUrl,{
                method:'POST',
                credentials:'same-origin',
                headers:{
                    'Accept':'application/json',
                    'X-CSRF-TOKEN':csrf
                },
                body:new FormData(billingForm)
            });

            const data=await EncoreShopUI.json(response);

            if(data.requires_login){
                window.location.href=data.login_url||loginUrl;
                throw new Error('Your session has expired.');
            }

            if(!response.ok||!data.success){
                throw new Error(data.message||'Unable to save your details.');
            }

            applySavedBilling(data.billing||{});
            updateSummary(data.payment||{});

            billingDirty=false;
            setBillingSaved(true);

            if(showToast){
                EncoreShopUI.toast(data.message||'Details saved successfully.','success');
            }

            return data;
        }finally{
            EncoreShopUI.buttonLoading(billingButton,false);

            if(showLoader){
                EncoreShopUI.hideLoader();
            }
        }
    }

    sameAddress.addEventListener('change',function(){
        toggleShipping();
        markBillingDirty();
    });

    billingForm.addEventListener('input',markBillingDirty);

    billingForm.addEventListener('change',function(event){
        if(event.target!==sameAddress){
            markBillingDirty();
        }
    });

    if(billingCountry){
        billingCountry.addEventListener('change',function(){
            syncCountryNames();
            markBillingDirty();
        });
    }

    if(shippingCountry){
        shippingCountry.addEventListener('change',function(){
            syncCountryNames();
            markBillingDirty();
        });
    }

    syncCountryNames();
    toggleShipping();

    billingForm.addEventListener('submit',async function(event){
        event.preventDefault();

        try{
            await saveBilling({
                showToast:true,
                showLoader:true
            });
        }catch(error){
            showError(billingError,error.message);
            EncoreShopUI.toast(error.message,'error');
        }
    });

    function cleanCardNumber(){
        return(cardNumber.value||'').replace(/[^0-9]/g,'');
    }

    function detectCardType(number){
        if(/^4/.test(number)){
            return{id:1,label:'Visa',image:cardBrandImages[1]};
        }

        if(/^(5[1-5]|2[2-7])/.test(number)){
            return{id:2,label:'Mastercard',image:cardBrandImages[2]};
        }

        if(/^3[47]/.test(number)){
            return{id:3,label:'American Express',image:cardBrandImages[3]};
        }

        return{id:0,label:'',image:''};
    }

    cardNumber.addEventListener('input',function(){
        const digits=cleanCardNumber().slice(0,19);
        cardNumber.value=digits.replace(/([0-9]{4})(?=[0-9])/g,'$1 ');

        const detected=detectCardType(digits);

        if(detected.image){
            cardBrand.src=detected.image;
            cardBrand.alt=detected.label;
            cardBrand.hidden=false;
        }else{
            cardBrand.src='';
            cardBrand.alt='';
            cardBrand.hidden=true;
        }

        if(detected.id){
            const radio=cardForm.querySelector('[name="card_type"][value="'+detected.id+'"]');
            if(radio)radio.checked=true;
        }
    });

    cardCode.addEventListener('input',function(){
        cardCode.value=cardCode.value.replace(/[^0-9]/g,'').slice(0,4);
    });

    cardForm.addEventListener('submit',async function(event){
        event.preventDefault();

        if(paymentBusy)return;

        clearError(paymentError);
        clearError(billingError);

        if(!billingForm.reportValidity()){
            showError(paymentError,'Please complete the required billing and shipping fields.');
            return;
        }

        if(!cardForm.reportValidity()){
            showError(paymentError,'Please complete all card fields.');
            return;
        }

        paymentBusy=true;
        EncoreShopUI.buttonLoading(payButton,true,'Processing');
        EncoreShopUI.showLoader('Processing payment');

        try{
            if(!billingSaved||billingDirty){
                await saveBilling({
                    showToast:false,
                    showLoader:false
                });
            }

            const response=await fetch(placeOrderUrl,{
                method:'POST',
                credentials:'same-origin',
                headers:{
                    'Accept':'application/json',
                    'X-CSRF-TOKEN':csrf
                },
                body:new FormData(cardForm)
            });

            const data=await EncoreShopUI.json(response);

            cardNumber.value='';
            cardCode.value='';
            cardBrand.src='';
            cardBrand.alt='';
            cardBrand.hidden=true;

            if(data.requires_login){
                window.location.href=data.login_url||loginUrl;
                return;
            }

            if(!response.ok||!data.success){
                throw new Error(data.message||'Payment could not be completed.');
            }

            EncoreShopUI.toast(data.message||'Order placed successfully!','success');

            window.setTimeout(function(){
                window.location.href=data.redirect||successUrl;
            },350);
        }catch(error){
            showError(paymentError,error.message);
            EncoreShopUI.toast(error.message,'error');
        }finally{
            paymentBusy=false;
            EncoreShopUI.buttonLoading(payButton,false);
            EncoreShopUI.hideLoader();
        }
    });
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
