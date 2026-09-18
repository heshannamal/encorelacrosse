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

<style>
    .ec-shop-catalog-intro{
        padding:24px 32px 18px;
        border-bottom:1px solid #ececec;
        background:#fff;
    }

    .ec-shop-catalog-intro-inner{
        width:min(1220px,100%);
        margin:0 auto;
        display:flex;
        align-items:flex-end;
        justify-content:space-between;
        gap:24px;
    }

    .ec-shop-catalog-kicker{
        margin-bottom:5px;
        color:var(--ec-red);
        font-family:'Oswald',sans-serif;
        font-size:10px;
        font-weight:400;
        letter-spacing:.11em;
        text-transform:uppercase;
    }

    .ec-shop-catalog-title{
        margin:0;
        color:#242424;
        font-family:'Oswald',sans-serif;
        font-size:clamp(28px,3vw,36px);
        font-weight:400;
        line-height:1.05;
        letter-spacing:.01em;
        text-transform:uppercase;
    }

    .ec-shop-catalog-subtitle{
        margin:7px 0 0;
        color:#7b7b7b;
        font-size:12px;
        line-height:1.6;
    }

    .ec-shop-catalog-count{
        flex:0 0 auto;
        padding:7px 11px;
        border:1px solid #e2e2e2;
        background:#fafafa;
        color:#777;
        font-size:11px;
        white-space:nowrap;
    }

    .ec-shop-catalog-count strong{
        color:#222;
        font-weight:700;
    }

    .ec-shop .ec-shop-toolbar{
        border-top:0;
        box-shadow:0 2px 10px rgba(0,0,0,.025);
    }

    .ec-shop .ec-shop-toolbar-inner{
        grid-template-columns:repeat(5,minmax(0,1fr));
        padding-top:11px;
        padding-bottom:11px;
    }

    .ec-shop .ec-active-filters{
        padding-top:12px;
        padding-bottom:4px;
    }

    .ec-shop .encore-legacy-product-grid{
        padding-top:22px;
    }

    @media(max-width:1199.98px){
        .ec-shop .ec-shop-toolbar-inner{
            grid-template-columns:repeat(3,minmax(0,1fr));
        }
    }

    @media(max-width:767.98px){
        .ec-shop .ec-shop-toolbar-inner{
            grid-template-columns:repeat(2,minmax(0,1fr));
        }

        .ec-shop-catalog-intro{
            padding:20px 14px 16px;
        }

        .ec-shop-catalog-intro-inner{
            align-items:flex-start;
            flex-direction:column;
            gap:12px;
        }

        .ec-shop-catalog-title{
            font-size:28px;
        }

        .ec-shop-catalog-count{
            padding:6px 9px;
        }
    }

    @media(max-width:480px){
        .ec-shop .ec-shop-toolbar-inner{
            grid-template-columns:1fr;
        }
    }
</style>

<div class="ec-shop">
    @include('shop.ecommerce._flash')

    @if(!empty($apiError))
        <div class="ec-shop-message ec-shop-message-error">{{ $apiError }}</div>
    @endif

    <form method="GET" action="{{ route('allProduct') }}" class="ec-shop-toolbar" id="ecFilterForm">
        @if($searchTerm !== '')
            <input type="hidden" name="search" value="{{ $searchTerm }}">
        @endif

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

    <section class="ec-shop-catalog-intro">
        <div class="ec-shop-catalog-intro-inner">
            <div>
                <div class="ec-shop-catalog-kicker">Encore Lacrosse Apparel</div>
                <h1 class="ec-shop-catalog-title">{{ $searchTerm !== '' ? 'Search Results' : 'Shop All Products' }}</h1>
                <p class="ec-shop-catalog-subtitle">
                    @if($searchTerm !== '')
                        Showing products matching &ldquo;{{ $searchTerm }}&rdquo;.
                    @else
                        Browse apparel, teamwear and training gear from the Encore inventory.
                    @endif
                </p>
            </div>

            <div class="ec-shop-catalog-count">
                <strong>{{ $products->count() }}</strong>
                {{ $products->count() === 1 ? 'product' : 'products' }}
                @if($searchTerm !== '')
                    found
                @endif
            </div>
        </div>
    </section>

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
