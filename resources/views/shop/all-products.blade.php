@extends('layouts.app')

@section('title', 'Shop | Encore Lacrosse Apparel')

@section('content')
@php
    $products = isset($products) ? collect($products) : collect();
    $mainCategories = $mainCategories ?? [];
    $sports = $sports ?? [];
    $productCategories = $productCategories ?? [];
    $apiError = $apiError ?? null;
    $searchTerm = trim((string) request('search', ''));
    $hasFilters = request()->filled('selectedSport') || request()->filled('selectedStyle') || request()->filled('selectedGender') || request()->filled('search') || request()->filled('sort') || (request()->filled('selectedCategory') && (string) request('selectedCategory') !== '5');
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
        <h1 class="ec-shop-title">{{ $searchTerm !== '' ? 'Search Results' : 'Shop All Products' }}</h1>
        <p class="ec-shop-subtitle">
            @if($searchTerm !== '')
                Showing products matching &ldquo;{{ $searchTerm }}&rdquo;.
            @else
                Browse apparel, teamwear and training gear from the Encore inventory.
            @endif
        </p>
    </div>

    <form method="GET" action="{{ route('allProduct') }}" class="ec-shop-toolbar" id="ecFilterForm">
        <div class="ec-shop-toolbar-inner">
            <div class="ec-filter">
                <label>Category</label>
                <select name="selectedCategory" class="js-ec-auto-filter">
                    @foreach($mainCategories as $category)
                        @php
                            $categoryId = (string) data_get($category, 'id');
                        @endphp
                        <option value="{{ $categoryId }}" {{ (string) request('selectedCategory', '5') === $categoryId ? 'selected' : '' }}>{{ data_get($category, 'category_name') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Sport</label>
                <select name="selectedSport" class="js-ec-auto-filter">
                    <option value="">All Sports</option>
                    @foreach($sports as $sport)
                        <option value="{{ data_get($sport, 'id') }}" {{ (string)request('selectedSport') === (string)data_get($sport, 'id') ? 'selected' : '' }}>{{ data_get($sport, 'sport_name') }}</option>
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
            @if(request('selectedSport'))<a class="ec-chip" href="{{ route('allProduct', request()->except('selectedSport')) }}">Sport <span>×</span></a>@endif
            @if(request('selectedStyle'))<a class="ec-chip" href="{{ route('allProduct', request()->except('selectedStyle')) }}">Style <span>×</span></a>@endif
            @if(request('selectedGender'))<a class="ec-chip" href="{{ route('allProduct', request()->except('selectedGender')) }}">{{ request('selectedGender') }} <span>×</span></a>@endif
            <a class="ec-chip ec-chip-clear" href="{{ route('allProduct') }}">Clear All</a>
        </div>
    @endif

    <div style="padding:18px 32px 0;color:#777;font-size:12px;">
        <strong style="color:#333;">{{ $products->count() }}</strong>
        {{ $products->count() === 1 ? 'product' : 'products' }}
        @if($searchTerm !== '')
            found
        @endif
    </div>

    @include('shop.ecommerce._legacy-product-grid', ['apiError' => null])
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('ecFilterForm');

    document.querySelectorAll('.js-ec-auto-filter').forEach(function(select){
        select.addEventListener('change', function(){
            if (window.EncoreShopUI) {
                EncoreShopUI.showLoader('Loading products');
            }

            window.requestAnimationFrame(function(){
                form.submit();
            });
        });
    });

    form?.addEventListener('submit', function(){
        if (window.EncoreShopUI) {
            EncoreShopUI.showLoader('Loading products');
        }
    });

    document.querySelectorAll('.ec-active-filters a').forEach(function(link){
        link.addEventListener('click', function(){
            if (window.EncoreShopUI) {
                EncoreShopUI.showLoader('Loading products');
            }
        });
    });

    document.querySelectorAll('.encore-legacy-product-grid a[href]').forEach(function(link){
        link.addEventListener('click', function(event){
            if (
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey ||
                event.button === 1
            ) {
                return;
            }

            if (window.EncoreShopUI) {
                EncoreShopUI.showLoader('Loading product');
            }
        });
    });

    window.addEventListener('pageshow', function(){
        if (window.EncoreShopUI) {
            EncoreShopUI.hideLoader(true);
        }
    });
});
</script>
@include('shop.ecommerce._cart-sync')
@endsection
