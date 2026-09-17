@extends('layouts.app')

@section('title', 'Shopping Cart | Encore Lacrosse Apparel')

@section('content')
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')
@php
    $cartItems = isset($cartItems) ? collect($cartItems) : collect();
    $subtotal = (float) ($subtotal ?? 0);
    $apiError = $apiError ?? null;
    $initialCartPayload = $initialCartPayload ?? [
        'success' => true,
        'items' => $cartItems->values()->all(),
        'subtotal' => $subtotal,
        'item_quantity' => (int) $cartItems->sum('quantity'),
        'cart_count' => $cartItems->count(),
        'warnings' => [],
    ];
@endphp

<div class="ec-shop">
    <div class="ec-shop-shell">
        <header class="ec-page-heading">
            <div><div class="ec-shop-kicker">Your Bag</div><h1 class="ec-shop-title">Shopping Cart</h1><p class="ec-shop-subtitle">Review your items and update quantities before checkout.</p></div>
            <a href="{{ route('allProduct') }}" class="ec-btn ec-btn-light"><i class="bi bi-arrow-left"></i> Continue Shopping</a>
        </header>

        @if(session('success'))<div class="ec-shop-message ec-shop-message-success" style="width:100%">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="ec-shop-message ec-shop-message-error" style="width:100%">{{ session('error') }}</div>@endif
        @if($apiError)<div class="ec-shop-message ec-shop-message-error" style="width:100%">{{ $apiError }}</div>@endif

        <div class="ec-cart-layout">
            <section class="ec-cart-list" id="ecCartList"><div class="ec-empty"><div class="ec-mini-ring" style="margin:auto"></div><p>Loading your cart…</p></div></section>
            <aside class="ec-summary">
                <h2>Order Summary</h2>
                <div class="ec-summary-line"><span>Items</span><strong id="ecItemQty">—</strong></div>
                <div class="ec-summary-line ec-summary-total"><span>Subtotal</span><strong id="ecSubtotal">—</strong></div>
                <p class="ec-summary-note">Shipping, tax and processing fees are calculated during checkout.</p>
                <button type="button" id="ecCheckoutButton" class="ec-btn ec-btn-dark ec-btn-full" style="margin-top:18px" disabled><i class="bi bi-lock"></i> Proceed to Checkout</button>
            </aside>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    const list=document.getElementById('ecCartList'),checkoutButton=document.getElementById('ecCheckoutButton'),csrf=@json(csrf_token()),dataUrl=@json(route('cart.data')),updateTemplate=@json(route('cart.update',['cartId'=>'__ID__'])),removeTemplate=@json(route('cart.remove',['cartId'=>'__ID__'])),validateUrl=@json(route('cart.validate')),shopUrl=@json(route('allProduct')),loginUrl=@json(route('login')),productTemplate=@json(route('product',['id'=>'__ID__'])),placeholder=@json(asset('images/product-placeholder.svg')),initialPayload=@json($initialCartPayload);
    const money=value=>'$'+Number(value||0).toFixed(2);
    function esc(value){const d=document.createElement('div');d.textContent=value??'';return d.innerHTML}
    function setSummary(data){document.getElementById('ecItemQty').textContent=data.item_quantity||0;document.getElementById('ecSubtotal').textContent=money(data.subtotal);checkoutButton.disabled=!data.items||data.items.length===0;if(window.syncEncoreCartCount)window.syncEncoreCartCount()}
    function render(data){const items=data.items||[];setSummary(data);if(!items.length){list.innerHTML=`<div class="ec-empty"><i class="bi bi-cart"></i><h3>Your Cart Is Empty</h3><p>Add something from the Encore shop to get started.</p><a href="${shopUrl}" class="ec-btn ec-btn-dark">Shop Products</a></div>`;return}list.innerHTML=items.map(item=>{const productUrl=productTemplate.replace('__ID__',item.id);const color=item.color_hex?`<div class="ec-cart-meta">Color: <span style="display:inline-block;width:11px;height:11px;margin:0 4px;border:1px solid #bbb;border-radius:50%;background:${esc(item.color_hex)};vertical-align:middle"></span>${esc(item.color_name||item.color_hex)}</div>`:'';return `<article class="ec-cart-row" data-cart-id="${item.cart_id}"><a href="${productUrl}"><img class="ec-cart-img" src="${esc(item.images?.[0]||placeholder)}" alt="${esc(item.name)}" onerror="this.src='${placeholder}'"></a><div><a class="ec-cart-name" href="${productUrl}">${esc(item.name)}</a><div class="ec-cart-meta">Size: ${esc(item.size_name||'—')}</div>${color}<div class="ec-cart-meta">Each: ${money(item.price)}</div></div><div class="ec-cart-controls"><div class="ec-qty"><button type="button" class="js-qty-minus">−</button><input type="text" value="${item.quantity}" readonly><button type="button" class="js-qty-plus">+</button></div><div class="ec-line-price">${money(item.line_total)}</div><button type="button" class="ec-remove js-remove" aria-label="Remove"><i class="bi bi-trash"></i></button></div></article>`}).join('')}
    async function loadCart(showOverlay=false){if(showOverlay)EncoreShopUI.showLoader('Loading cart');try{const data=await EncoreShopUI.json(await fetch(dataUrl,{headers:{'Accept':'application/json'},credentials:'same-origin'}));if(!data.success)throw new Error(data.message||'Unable to load cart.');(data.warnings||[]).forEach(w=>EncoreShopUI.toast(w,'warning'));render(data)}catch(error){list.innerHTML=`<div class="ec-empty"><i class="bi bi-exclamation-circle"></i><h3>Could Not Load Cart</h3><p>${esc(error.message)}</p><button type="button" class="ec-btn ec-btn-dark" id="ecRetryCart">Retry</button></div>`;document.getElementById('ecRetryCart')?.addEventListener('click',()=>loadCart(true))}finally{if(showOverlay)EncoreShopUI.hideLoader()}}
    async function updateRow(row,quantity){row.classList.add('ec-row-loading');try{const data=await EncoreShopUI.json(await fetch(updateTemplate.replace('__ID__',row.dataset.cartId),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':csrf},body:new URLSearchParams({_method:'PUT',quantity:String(quantity)})}));if(!data.success)throw new Error(data.message||'Unable to update cart.');render(data);EncoreShopUI.toast(data.message||'Cart updated.','success')}catch(error){row.classList.remove('ec-row-loading');EncoreShopUI.toast(error.message,'error')}}
    list.addEventListener('click',async event=>{const row=event.target.closest('.ec-cart-row[data-cart-id]');if(!row)return;const current=Number(row.querySelector('.ec-qty input')?.value||1);if(event.target.closest('.js-qty-plus'))return updateRow(row,current+1);if(event.target.closest('.js-qty-minus')){if(current>1)return updateRow(row,current-1);return}if(event.target.closest('.js-remove')){if(!confirm('Remove this item from your cart?'))return;row.classList.add('ec-row-loading');try{const data=await EncoreShopUI.json(await fetch(removeTemplate.replace('__ID__',row.dataset.cartId),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':csrf},body:new URLSearchParams({_method:'DELETE'})}));if(!data.success)throw new Error(data.message||'Unable to remove item.');render(data);EncoreShopUI.toast(data.message||'Item removed.','success')}catch(error){row.classList.remove('ec-row-loading');EncoreShopUI.toast(error.message,'error')}}});
    checkoutButton.addEventListener('click',async()=>{EncoreShopUI.buttonLoading(checkoutButton,true,'Checking');EncoreShopUI.showLoader('Preparing checkout');try{const data=await EncoreShopUI.json(await fetch(validateUrl,{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':csrf}}));if(data.requires_login){window.location.href=data.login_url||loginUrl;return}if(!data.success)throw new Error(data.message||'Unable to continue to checkout.');window.location.href=data.redirect}catch(error){EncoreShopUI.toast(error.message,'error')}finally{EncoreShopUI.buttonLoading(checkoutButton,false);EncoreShopUI.hideLoader()}});
    if(initialPayload?.success)render(initialPayload);else loadCart(false);
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
