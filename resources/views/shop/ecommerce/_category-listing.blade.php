@php
    $products = isset($products) ? collect($products) : collect();
    $mainCategories = $mainCategories ?? [];
    $sports = $sports ?? [];
    $productCategories = $productCategories ?? [];
    $apiError = $apiError ?? null;
    $defaultStyleId = $defaultStyleId ?? null;
    $defaultGender = $defaultGender ?? null;
    $filterRouteName = $filterRouteName ?? 'shop.mens-tops';

    $selectedCategory = request()->has('selectedCategory')
        ? (string) request('selectedCategory')
        : '5';

    $selectedStyle = request()->has('selectedStyle')
        ? (string) request('selectedStyle')
        : (string) ($defaultStyleId ?? '');

    $selectedGender = request()->has('selectedGender')
        ? (string) request('selectedGender')
        : (string) ($defaultGender ?? '');

    $selectedSport = request()->has('selectedSport')
        ? (string) request('selectedSport')
        : '';

    $hasFilters = request()->filled('search')
        || request()->filled('sort')
        || request()->has('selectedCategory')
        || request()->has('selectedStyle')
        || request()->has('selectedGender')
        || request()->filled('selectedSport');
@endphp

@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')

<style>
    .ec-category-shop{padding-top:0}
    .ec-category-shop .ec-shop-toolbar{top:90px}
    .ec-category-shop .ec-shop-full{padding-top:30px}
    .ec-category-shop .ec-product-card{border:1px solid #ededed}
    .ec-category-shop .ec-product-image-wrap{background:#f7f7f7}
    .ec-category-shop .ec-product-image{aspect-ratio:1/1.08;object-fit:cover}
    .ec-category-shop .ec-product-info{padding:15px 12px 18px}
    .ec-category-shop .ec-product-name{min-height:40px;margin-bottom:7px}
    .ec-category-shop .ec-view-more{background:#4bcdb0}
    .ec-category-shop .ec-filter-search button{cursor:pointer}
    .ec-category-filter-summary{padding:17px 32px 0;color:#7d7d7d;font-size:12px}
    .ec-category-filter-summary strong{color:#333;font-weight:600}
    @media(max-width:991.98px){
        .ec-category-shop .ec-shop-toolbar{top:64px}
    }
    @media(max-width:767.98px){
        .ec-category-filter-summary{padding:14px 14px 0}
    }
</style>

<section class="ec-shop ec-category-shop">
    @if(!empty($apiError))
        <div class="ec-shop-message ec-shop-message-error">{{ $apiError }}</div>
    @endif

    <form method="GET" action="{{ route($filterRouteName) }}" class="ec-shop-toolbar" id="ecCategoryFilterForm">
        <div class="ec-shop-toolbar-inner">
            <div class="ec-filter">
                <label>Category</label>
                <select name="selectedCategory" class="js-ec-category-filter">
                    @foreach($mainCategories as $category)
                        @php
                            $categoryId = (string) data_get($category, 'id');
                        @endphp
                        <option value="{{ $categoryId }}" {{ $selectedCategory === $categoryId ? 'selected' : '' }}>
                            {{ data_get($category, 'category_name', data_get($category, 'name')) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Style</label>
                <select name="selectedStyle" class="js-ec-category-filter">
                    <option value="" {{ $selectedStyle === '' ? 'selected' : '' }}>All Styles</option>
                    @foreach($productCategories as $style)
                        @php
                            $styleId = (string) data_get($style, 'id');
                        @endphp
                        <option value="{{ $styleId }}" {{ $selectedStyle === $styleId ? 'selected' : '' }}>
                            {{ data_get($style, 'product_category_name', data_get($style, 'category_name', data_get($style, 'name'))) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Gender</label>
                <select name="selectedGender" class="js-ec-category-filter">
                    <option value="" {{ $selectedGender === '' ? 'selected' : '' }}>All</option>
                    @foreach(['Men','Women','Youth','Uni'] as $gender)
                        <option value="{{ $gender }}" {{ $selectedGender === $gender ? 'selected' : '' }}>{{ $gender }}</option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Sport</label>
                <select name="selectedSport" class="js-ec-category-filter">
                    <option value="" {{ $selectedSport === '' ? 'selected' : '' }}>All Sports</option>
                    @foreach($sports as $sport)
                        @php
                            $sportId = (string) data_get($sport, 'id');
                        @endphp
                        <option value="{{ $sportId }}" {{ $selectedSport === $sportId ? 'selected' : '' }}>
                            {{ data_get($sport, 'sport_name', data_get($sport, 'name')) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="ec-filter">
                <label>Sort</label>
                <select name="sort" class="js-ec-category-filter">
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
            @if(request('search'))
                <a class="ec-chip" href="{{ route($filterRouteName, request()->except('search')) }}">
                    Search: {{ request('search') }} <span>×</span>
                </a>
            @endif

            @if(request()->has('selectedCategory'))
                <a class="ec-chip" href="{{ route($filterRouteName, request()->except('selectedCategory')) }}">
                    Category <span>×</span>
                </a>
            @endif

            @if(request()->has('selectedStyle'))
                <a class="ec-chip" href="{{ route($filterRouteName, request()->except('selectedStyle')) }}">
                    Style <span>×</span>
                </a>
            @endif

            @if(request()->has('selectedGender'))
                <a class="ec-chip" href="{{ route($filterRouteName, request()->except('selectedGender')) }}">
                    Gender <span>×</span>
                </a>
            @endif

            @if(request('selectedSport'))
                <a class="ec-chip" href="{{ route($filterRouteName, request()->except('selectedSport')) }}">
                    Sport <span>×</span>
                </a>
            @endif

            <a class="ec-chip ec-chip-clear" href="{{ route($filterRouteName) }}">Reset Filters</a>
        </div>
    @endif

    <div class="ec-category-filter-summary">
        <strong>{{ $products->count() }}</strong>
        {{ \Illuminate\Support\Str::plural('product', $products->count()) }}
    </div>

    <div class="ec-shop-full">
        @forelse($products as $product)
            @php
                $images = collect($product['images'] ?? [])->filter()->unique()->values();

                if ($images->isEmpty()) {
                    $images = collect([asset('images/product-placeholder.svg')]);
                }

                $carouselId = 'ecCategoryProductCarousel' . $product['id'];
                $productUrl = route('product', $product['id']);
            @endphp

            @if($loop->first)
                <div class="ec-product-grid">
            @endif

            <article class="ec-product-card js-ec-category-product-card" data-url="{{ $productUrl }}" tabindex="0" role="link">
                <div class="ec-product-image-wrap">
                    <div id="{{ $carouselId }}" class="carousel slide js-ec-category-carousel" data-bs-ride="false" data-bs-interval="false" data-bs-touch="true">
                        <div class="carousel-inner">
                            @foreach($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <a href="{{ $productUrl }}" class="ec-product-image-link">
                                        <img src="{{ $image }}" alt="{{ $product['name'] }}" class="ec-product-image" loading="lazy" draggable="false">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="ec-product-info">
                    <h3 class="ec-product-name">
                        <a href="{{ $productUrl }}">{{ $product['name'] }}</a>
                    </h3>
                    <div class="ec-product-price">
                        {{ $product['price_formatted'] ?? (($product['currency_symbol'] ?? '$') . number_format((float) ($product['price'] ?? 0), 2)) }}
                    </div>
                    <a href="{{ $productUrl }}" class="ec-view-more">View Product</a>
                </div>
            </article>

            @if($loop->last)
                </div>
            @endif
        @empty
            <div class="ec-empty">
                <i class="bi bi-bag"></i>
                <h3>No products found</h3>
                <p>Try changing the filters or search term.</p>
                <a href="{{ route($filterRouteName) }}" class="ec-btn ec-btn-dark">Reset Filters</a>
            </div>
        @endforelse
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('ecCategoryFilterForm');

    document.querySelectorAll('.js-ec-category-filter').forEach(function (select) {
        select.addEventListener('change', function () {
            if (!form) return;
            if (window.EncoreShopUI) {
                EncoreShopUI.showLoader('Loading products');
            }
            requestAnimationFrame(function () {
                form.submit();
            });
        });
    });

    form?.addEventListener('submit', function () {
        if (window.EncoreShopUI) {
            EncoreShopUI.showLoader('Loading products');
        }
    });

    document.querySelectorAll('.ec-active-filters a').forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.EncoreShopUI) {
                EncoreShopUI.showLoader('Loading products');
            }
        });
    });

    document.querySelectorAll('.js-ec-category-carousel').forEach(function (element) {
        const carousel = bootstrap.Carousel.getOrCreateInstance(element, {
            interval: false,
            ride: false,
            touch: true,
            wrap: true
        });

        let startX = 0;
        let currentX = 0;
        let dragging = false;
        let moved = false;

        element.addEventListener('pointerdown', function (event) {
            if (event.pointerType === 'mouse' && event.button !== 0) return;
            startX = currentX = event.clientX;
            dragging = true;
            moved = false;
        });

        element.addEventListener('pointermove', function (event) {
            if (!dragging) return;
            currentX = event.clientX;
            if (Math.abs(currentX - startX) > 8) moved = true;
        });

        element.addEventListener('pointerup', function () {
            if (!dragging) return;
            dragging = false;
            const diff = currentX - startX;
            if (diff < -45) carousel.next();
            if (diff > 45) carousel.prev();
        });

        element.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function (event) {
                if (moved) {
                    event.preventDefault();
                    event.stopPropagation();
                    moved = false;
                }
            });
        });
    });

    document.querySelectorAll('.js-ec-category-product-card').forEach(function (card) {
        card.addEventListener('click', function (event) {
            if (event.target.closest('a,button,input,select,textarea,label')) return;
            if (!card.dataset.url) return;
            if (window.EncoreShopUI) EncoreShopUI.showLoader('Loading product');
            window.location.href = card.dataset.url;
        });

        card.addEventListener('keydown', function (event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;
            if (event.target.closest('a,button,input,select,textarea')) return;
            event.preventDefault();
            if (window.EncoreShopUI) EncoreShopUI.showLoader('Loading product');
            window.location.href = card.dataset.url;
        });
    });

    window.addEventListener('pageshow', function () {
        if (window.EncoreShopUI) EncoreShopUI.hideLoader(true);
    });
});
</script>

@include('shop.ecommerce._cart-sync')
