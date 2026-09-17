@extends('layouts.app')

@section('title', ($product['name'] ?? 'Product') . ' | Encore Lacrosse Apparel')

@section('content')
@php
    $product = is_array($product ?? null) ? $product : [];
    $options = is_array($options ?? null) ? $options : [];
    $options['sizes'] = isset($options['sizes']) ? collect($options['sizes']) : collect();
    $options['colors'] = isset($options['colors']) ? collect($options['colors']) : collect();
    $options['combinations'] = isset($options['combinations']) ? collect($options['combinations']) : collect();
@endphp
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')

<div class="ec-shop">
    @include('shop.ecommerce._flash')
    <div class="ec-shop-shell">
        <div class="ec-product-layout">
            <div>
                @php($images = collect($product['images'] ?? [])->filter()->values())
                <div class="ec-main-image"><img id="ecMainProductImage" src="{{ $images->first() ?? asset('images/product-placeholder.svg') }}" alt="{{ $product['name'] ?? 'Product' }}"></div>
                @if($images->count() > 1)
                    <div class="ec-thumbs">
                        @foreach($images as $index => $image)
                            <button type="button" class="ec-thumb {{ $index === 0 ? 'active' : '' }}" data-image="{{ $image }}"><img src="{{ $image }}" alt="{{ $product['name'] }} image {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <div class="ec-shop-kicker">Encore Lacrosse Shop</div>
                <h1 class="ec-product-detail-title">{{ $product['name'] }}</h1>
                <div class="ec-product-detail-price">{{ $product['currency_symbol'] }}{{ number_format($product['price'], 2) }}</div>

                @if(!empty($product['description']))
                    <div class="ec-description">{!! nl2br(e(strip_tags($product['description']))) !!}</div>
                @endif

                <form id="ecAddToCartForm">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <input type="hidden" name="buy_now" id="ecBuyNow" value="0">

                    <div style="margin-top:18px">
                        <label class="ec-label" for="ecSize">Size</label>
                        <select name="size_id" id="ecSize" class="ec-select" required>
                            <option value="">Select Size</option>
                            @foreach($options['sizes'] as $size)
                                <option value="{{ data_get($size, 'id') }}">{{ data_get($size, 'size_name') }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if($options['colors']->count())
                        <div style="margin-top:15px">
                            <label class="ec-label" for="ecColor">Color</label>
                            <select name="color_id" id="ecColor" class="ec-select" required>
                                <option value="">Select Color</option>
                                @foreach($options['colors'] as $color)
                                    <option value="{{ data_get($color, 'id') }}">{{ data_get($color, 'pantone_code') ?: data_get($color, 'hex') ?: ('Color ' . data_get($color, 'id')) }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <input type="hidden" name="color_id" id="ecColor" value="">
                    @endif

                    <div style="margin-top:15px">
                        <label class="ec-label" for="ecQty">Quantity</label>
                        <input type="number" class="ec-input" id="ecQty" name="quantity" value="1" min="1" max="1" required>
                        <div class="ec-stock-note" id="ecStockNote">Choose available options to see stock.</div>
                    </div>

                    <div id="ecCartMessage" style="margin-top:12px;font-size:13px"></div>
                    <div class="ec-actions">
                        <button type="submit" class="ec-btn ec-btn-dark" id="ecAddButton" disabled>Add to Cart</button>
                        <button type="button" class="ec-btn ec-btn-light" id="ecBuyButton" disabled>Buy Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.ec-thumb').forEach(thumb=>thumb.addEventListener('click',()=>{
        document.getElementById('ecMainProductImage').src=thumb.dataset.image;
        document.querySelectorAll('.ec-thumb').forEach(item=>item.classList.remove('active'));
        thumb.classList.add('active');
    }));

    const combinations=@json($options['combinations']->values());
    const size=document.getElementById('ecSize');
    const color=document.getElementById('ecColor');
    const qty=document.getElementById('ecQty');
    const addButton=document.getElementById('ecAddButton');
    const buyButton=document.getElementById('ecBuyButton');
    const stockNote=document.getElementById('ecStockNote');
    const hasColors={{ $options['colors']->count() ? 'true' : 'false' }};

    function updateStock(){
        const sizeId=Number(size.value||0),colorId=color?Number(color.value||0):0;
        const match=combinations.find(item=>Number(item.size_id)===sizeId&&(!hasColors||Number(item.color_id||0)===colorId));
        const stock=match?Number(match.stock_qty||0):0;
        const ready=sizeId>0&&(!hasColors||colorId>0)&&stock>0;
        qty.max=Math.max(1,stock);if(Number(qty.value)>stock&&stock>0)qty.value=stock;
        addButton.disabled=!ready;buyButton.disabled=!ready;
        stockNote.textContent=ready?stock+' available':(sizeId&&(!hasColors||colorId)?'Out of stock for this selection.':'Choose available options to see stock.');
    }
    size.addEventListener('change',updateStock);if(color)color.addEventListener('change',updateStock);

    const form=document.getElementById('ecAddToCartForm');
    form.addEventListener('submit',async function(event){
        event.preventDefault();const message=document.getElementById('ecCartMessage');const isBuyNow=document.getElementById('ecBuyNow').value==='1';const activeButton=isBuyNow?buyButton:addButton;
        message.textContent='';addButton.disabled=true;buyButton.disabled=true;EncoreShopUI.buttonLoading(activeButton,true,isBuyNow?'Processing':'Adding');EncoreShopUI.showLoader(isBuyNow?'Preparing checkout':'Adding to cart');
        try{
            const response=await fetch(@json(route('cart.add')),{method:'POST',headers:{'Accept':'application/json','X-CSRF-TOKEN':form.querySelector('[name="_token"]').value},body:new FormData(form),credentials:'same-origin'});
            const data=await EncoreShopUI.json(response);if(!response.ok||!data.success)throw new Error(data.message||'Unable to add item.');if(window.syncEncoreCartCount)window.syncEncoreCartCount();window.location.href=data.redirect||@json(route('cart'));
        }catch(error){EncoreShopUI.hideLoader(true);EncoreShopUI.buttonLoading(activeButton,false);document.getElementById('ecBuyNow').value='0';message.style.color='#b42318';message.textContent=error.message;EncoreShopUI.toast(error.message,'error');updateStock()}
    });
    buyButton.addEventListener('click',()=>{document.getElementById('ecBuyNow').value='1';form.requestSubmit()});
    addButton.addEventListener('click',()=>document.getElementById('ecBuyNow').value='0');
    window.addEventListener('pageshow',()=>{EncoreShopUI.hideLoader(true);EncoreShopUI.buttonLoading(addButton,false);EncoreShopUI.buttonLoading(buyButton,false);updateStock()});
    updateStock();
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
