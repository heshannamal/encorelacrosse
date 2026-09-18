@php
    $products = isset($products) ? collect($products) : collect();
    $apiError = $apiError ?? null;
@endphp

<style>
    .encore-legacy-product-grid {
        padding: 3rem 0;
        background: #fff;
    }

    .encore-legacy-product-grid .product-card-link {
        color: inherit;
        text-decoration: none;
    }

    .encore-legacy-product-grid .card {
        height: 100%;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        background: #fff;
        overflow: hidden;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .encore-legacy-product-grid .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 .45rem 1rem rgba(0, 0, 0, .08);
    }

    .encore-legacy-product-grid .card-img-top {
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        background: #f7f7f7;
    }

    .encore-legacy-product-grid .card-body {
        padding: 1rem;
    }

    .encore-legacy-product-grid .card-title {
        margin-bottom: .5rem;
        color: #333;
        font-family: 'Oswald', sans-serif;
        font-size: 1.15rem;
        font-weight: 400;
        line-height: 1.35;
        text-transform: none;
    }

    .encore-legacy-product-grid .card-text {
        margin-bottom: 0;
        color: #444;
        font-size: .95rem;
    }

    .encore-legacy-product-grid .product-error,
    .encore-legacy-product-grid .product-empty {
        max-width: 720px;
        margin: 0 auto;
        padding: 1rem 1.25rem;
        text-align: center;
    }

    .encore-legacy-product-grid .product-error {
        border: 1px solid #f0c7c7;
        background: #fff4f4;
        color: #9b1c1c;
    }

    .encore-legacy-product-grid .product-empty {
        color: #777;
    }

    @media (max-width: 767.98px) {
        .encore-legacy-product-grid {
            padding: 2rem 0;
        }
    }
</style>

<section class="encore-legacy-product-grid">
    <div class="container">
        @if($apiError)
            <div class="product-error mb-4">{{ $apiError }}</div>
        @endif

        @if($products->isNotEmpty())
            <div class="row">
                @foreach($products as $product)
                    @php
                        $image = collect($product['images'] ?? [])->filter()->first()
                            ?: asset('images/product-placeholder.svg');
                        $url = route('product', $product['id']);
                    @endphp

                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <a href="{{ $url }}" class="product-card-link" aria-label="View {{ $product['name'] }}">
                            <div class="card">
                                <img
                                    src="{{ $image }}"
                                    class="card-img-top"
                                    alt="{{ $product['name'] }}"
                                    loading="lazy"
                                >
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text">
                                        {{ $product['price_formatted'] ?? (($product['currency_symbol'] ?? '$') . number_format((float) ($product['price'] ?? 0), 2)) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @elseif(!$apiError)
            <div class="product-empty">No products are currently available in this collection.</div>
        @endif
    </div>
</section>
