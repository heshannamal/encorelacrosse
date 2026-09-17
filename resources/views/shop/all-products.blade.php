@extends('layouts.app')

@section('title', 'Shop | Encore Lacrosse Apparel')

@section('content')
@php
    $products = isset($products) ? collect($products) : collect();
    $mainCategories = $mainCategories ?? [];
    $productCategories = $productCategories ?? [];
    $apiError = $apiError ?? null;
    $hasFilters = request()->filled('selectedStyle') || request()->filled('selectedGender') || request()->filled('search') || request()->filled('sort') || (request()->filled('selectedCategory') && (string)request('selectedCategory') !== '5');
@endphp
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')

<div class="ec-shop">
    @include('shop.ecommerce._flash')

    @if(!empty($apiError))
        <div class="ec-shop-message ec-shop-message-error">{{ $apiError }}</div>
    @endif

    <div class="ec-shop-shell" style="padding-bottom:22px">
        <div class="ec-shop-kicker">Encore Lacrosse Apparel</div>
        <h1 class="ec-shop-title">Shop All Products</h1>
        <p class="ec-shop-subtitle">Browse apparel, teamwear and training gear from the Encore inventory.</p>
    </div>

    <form method="GET" action="{{ route('allProduct') }}" class="ec-shop-toolbar" id="ecFilterForm">
        <div class="ec-shop-toolbar-inner">
            <div class="ec-filter">
                <label>Category</label>
                <select name="selectedCategory" class="js-ec-auto-filter">
                    @foreach($mainCategories as $category)
                        @php($categoryId = (string)data_get($category, 'id'))
                        <option value="{{ $categoryId }}" {{ (string)request('selectedCategory', '5') === $categoryId ? 'selected' : '' }}>{{ data_get($category, 'category_name') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Style</label>
                <select name="selectedStyle" class="js-ec-auto-filter">
                    <option value="">All Styles</option>
                    @foreach($productCategories as $style)
                        <option value="{{ data_get($style, 'id') }}" {{ (string)request('selectedStyle') === (string)data_get($style, 'id') ? 'selected' : '' }}>{{ data_get($style, 'product_category_name') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Gender</label>
                <select name="selectedGender" class="js-ec-auto-filter">
                    <option value="">All</option>
                    @foreach(['Men','Women','Youth','Uni'] as $gender)
                        <option value="{{ $gender }}" {{ request('selectedGender') === $gender ? 'selected' : '' }}>{{ $gender }}</option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Sort</label>
                <select name="sort" class="js-ec-auto-filter">
                    <option value="">Featured</option>
                    <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Name A-Z</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price Low to High</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price High to Low</option>
                </select>
            </div>

            <div class="ec-filter ec-filter-search">
                <label>Search</label>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search products...">
                <button type="submit" aria-label="Search"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </form>

    @if($hasFilters)
        <div class="ec-active-filters">
            @if(request('search'))<a class="ec-chip" href="{{ route('allProduct', request()->except('search')) }}">Search: {{ request('search') }} <span>×</span></a>@endif
            @if(request('selectedCategory') && (string)request('selectedCategory') !== '5')<a class="ec-chip" href="{{ route('allProduct', array_merge(request()->except('selectedCategory'), ['selectedCategory' => 5])) }}">Category <span>×</span></a>@endif
            @if(request('selectedStyle'))<a class="ec-chip" href="{{ route('allProduct', request()->except('selectedStyle')) }}">Style <span>×</span></a>@endif
            @if(request('selectedGender'))<a class="ec-chip" href="{{ route('allProduct', request()->except('selectedGender')) }}">{{ request('selectedGender') }} <span>×</span></a>@endif
            <a class="ec-chip ec-chip-clear" href="{{ route('allProduct') }}">Clear All</a>
        </div>
    @endif

    <div class="ec-shop-full">
        @if($products->isNotEmpty())
            <div class="ec-product-grid">
                @foreach($products as $product)
                    @php
                        $images = collect($product['images'] ?? [])->filter()->unique()->values();
                        $carouselId = 'ecProductCarousel' . $product['id'];
                        $productUrl = route('product', $product['id']);
                    @endphp
                    <article class="ec-product-card js-ec-product-card" data-url="{{ $productUrl }}" tabindex="0" role="link">
                        <div class="ec-product-image-wrap">
                            @if($images->count() > 1)
                                <div id="{{ $carouselId }}" class="carousel slide js-ec-swipe-carousel" data-bs-ride="false" data-bs-interval="false" data-bs-touch="true">
                                    <div class="carousel-inner">
                                        @foreach($images as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <a href="{{ $productUrl }}" class="ec-product-image-link"><img src="{{ $image }}" alt="{{ $product['name'] }}" class="ec-product-image" loading="lazy" draggable="false"></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a href="{{ $productUrl }}" class="ec-product-image-link"><img src="{{ $images->first() ?? asset('images/product-placeholder.svg') }}" alt="{{ $product['name'] }}" class="ec-product-image" loading="lazy" draggable="false"></a>
                            @endif
                        </div>
                        <div class="ec-product-info">
                            <h3 class="ec-product-name"><a href="{{ $productUrl }}">{{ $product['name'] }}</a></h3>
                            <div class="ec-product-price">{{ $product['currency_symbol'] }}{{ number_format($product['price'], 2) }}</div>
                            <a href="{{ $productUrl }}" class="ec-view-more">View More</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="ec-empty">
                <i class="bi bi-bag"></i>
                <h3>No products found</h3>
                <p>Try changing your filters or searching for another product.</p>
                <a href="{{ route('allProduct') }}" class="ec-btn ec-btn-dark">View All Products</a>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const form=document.getElementById('ecFilterForm');
    document.querySelectorAll('.js-ec-auto-filter').forEach(select=>select.addEventListener('change',()=>{EncoreShopUI.showLoader('Loading products');requestAnimationFrame(()=>form.submit())}));
    form?.addEventListener('submit',()=>EncoreShopUI.showLoader('Loading products'));
    document.querySelectorAll('.ec-active-filters a').forEach(link=>link.addEventListener('click',()=>EncoreShopUI.showLoader('Loading products')));

    document.querySelectorAll('.js-ec-swipe-carousel').forEach(element=>{
        const carousel=bootstrap.Carousel.getOrCreateInstance(element,{interval:false,ride:false,touch:true,wrap:true});
        let startX=0,currentX=0,dragging=false,moved=false;
        element.addEventListener('pointerdown',e=>{if(e.pointerType==='mouse'&&e.button!==0)return;startX=currentX=e.clientX;dragging=true;moved=false});
        element.addEventListener('pointermove',e=>{if(!dragging)return;currentX=e.clientX;if(Math.abs(currentX-startX)>8)moved=true});
        element.addEventListener('pointerup',()=>{if(!dragging)return;dragging=false;const diff=currentX-startX;if(diff<-45)carousel.next();if(diff>45)carousel.prev()});
        element.querySelectorAll('a').forEach(a=>a.addEventListener('click',e=>{if(moved){e.preventDefault();e.stopPropagation();moved=false}}));
    });

    document.querySelectorAll('.js-ec-product-card').forEach(card=>{
        card.addEventListener('click',e=>{if(e.target.closest('a,button,select,input'))return;window.location.href=card.dataset.url});
        card.addEventListener('keydown',e=>{if(e.key==='Enter')window.location.href=card.dataset.url});
    });
    window.addEventListener('pageshow',()=>EncoreShopUI.hideLoader(true));
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
