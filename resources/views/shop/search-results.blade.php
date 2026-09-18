@extends('layouts.app')

@section('title', $search !== '' ? 'Search Results for ' . $search . ' | Encore Lacrosse Apparel' : 'Search Products | Encore Lacrosse Apparel')

@section('content')
@php
    $products = isset($products) ? collect($products) : collect();
    $search = trim((string) ($search ?? ''));
    $apiError = $apiError ?? null;
    $productEmptyMessage = $search === ''
        ? 'Enter a product name, product number or pattern code to search.'
        : 'No products found for "' . $search . '".';
@endphp

<style>
    .encore-search-page {
        background: #fff;
        min-height: 60vh;
    }

    .encore-search-hero {
        padding: 42px 0 22px;
        border-bottom: 1px solid #ececec;
    }

    .encore-search-kicker {
        margin-bottom: 5px;
        color: #d71920;
        font-family: 'Oswald', sans-serif;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .encore-search-heading {
        margin: 0;
        color: #252525;
        font-family: 'Oswald', sans-serif;
        font-size: clamp(34px, 4vw, 50px);
        font-weight: 400;
        line-height: 1;
        text-transform: uppercase;
    }

    .encore-search-copy {
        margin: 10px 0 0;
        color: #777;
        font-size: 13px;
    }

    .encore-search-form {
        max-width: 760px;
        margin-top: 24px;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 54px;
        border: 1px solid #d9d9d9;
        background: #fff;
    }

    .encore-search-form input {
        width: 100%;
        height: 52px;
        padding: 0 16px;
        border: 0;
        outline: 0;
        background: transparent;
        color: #222;
        font-size: 15px;
    }

    .encore-search-form button {
        width: 54px;
        height: 52px;
        border: 0;
        border-left: 1px solid #e2e2e2;
        background: #222;
        color: #fff;
        font-size: 18px;
    }

    .encore-search-summary {
        padding: 20px 0 0;
        color: #777;
        font-size: 13px;
    }

    .encore-search-summary strong {
        color: #222;
        font-weight: 600;
    }

    .encore-search-page .encore-legacy-product-grid {
        padding-top: 24px;
    }

    @media (max-width: 767.98px) {
        .encore-search-hero {
            padding: 30px 0 18px;
        }

        .encore-search-form {
            margin-top: 18px;
        }
    }
</style>

<div class="encore-search-page">
    <section class="encore-search-hero">
        <div class="container">
            <div class="encore-search-kicker">Encore Lacrosse Apparel</div>
            <h1 class="encore-search-heading">Search Results</h1>

            @if($search !== '')
                <p class="encore-search-copy">
                    Results for <strong>&ldquo;{{ $search }}&rdquo;</strong>
                </p>
            @else
                <p class="encore-search-copy">Search the Encore product catalog.</p>
            @endif

            <form action="{{ route('search.results') }}" method="GET" class="encore-search-form" role="search">
                <input
                    type="search"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search products..."
                    autocomplete="off"
                    aria-label="Search products"
                >
                <button type="submit" aria-label="Submit search">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            @if($search !== '' && !$apiError)
                <div class="encore-search-summary">
                    <strong>{{ $products->count() }}</strong>
                    {{ IlluminateSupportStr::plural('product', $products->count()) }}
                    found
                </div>
            @endif
        </div>
    </section>

    @include('shop.ecommerce._legacy-product-grid')
</div>
@endsection
