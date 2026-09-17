@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pages/womens-racerbacks.css') }}">

@php
    $products = [
        [
            'title' => 'COLLEGIATE RACERBACK',
            'description' => 'The Collegiate racerback is a more conservative cut, designed to be sturdy on the shoulders. This piece is reversible allowing for a home and away color.',
            'features' => [
                'Raglan Sleeves',
                'Fabric HydroTek | Deztek | Deztek Lite | LatTek',
                'Modern style and fit. This racerback is built for the athletic girl and women.',
            ],
            'reverse' => false,
            'images' => [
                'images/teamwear/womensRacerbacks/collegiate-racerback-front.jpg',
                'images/teamwear/womensRacerbacks/collegiate-racerback-back.jpg',
                'images/teamwear/womensRacerbacks/collegiate-racerback-right.jpg',
                'images/teamwear/womensRacerbacks/collegiate-racerback-left.jpg',
            ],
        ],
        [
            'title' => 'PRO RACERBACK',
            'description' => 'The Pro racerback allows for freedom of movement so that the player can focus on being fierce and in control. Thinner straps and a narrow back yoke cut creates a more secure feel. This piece is reversible allowing for a home and away color.',
            'features' => [
                'Fabric HydroTek | Deztek | LatTek',
                'Modern style and fit. This racerback is built for the athletic girl and women.',
            ],
            'reverse' => true,
            'images' => [
                'images/teamwear/womensRacerbacks/pro-racerback-front.jpg',
                'images/teamwear/womensRacerbacks/pro-racerback-back.jpg',
                'images/teamwear/womensRacerbacks/pro-racerback-right.jpg',
                'images/teamwear/womensRacerbacks/pro-racerback-left.jpg',
            ],
        ],
        [
            'title' => "WOMEN'S PRO GAME JERSEY",
            'description' => 'V neck with a t-shirt cut and belled sides. This shirt is a simple and classic game jersey that stays stylishly consistent in an era.',
            'features' => [
                'Modern style slim sit.',
                'Fabric Deztek | Deztek Lite',
                'Modern style and fit. This racerback is built for the athletic girl and women.',
            ],
            'reverse' => false,
            'images' => [
                'images/teamwear/womensRacerbacks/womens-pro-game-jersey-front.jpg',
                'images/teamwear/womensRacerbacks/womens-pro-game-jersey-back.jpg',
                'images/teamwear/womensRacerbacks/womens-pro-game-jersey-right.jpg',
                'images/teamwear/womensRacerbacks/womens-pro-game-jersey-left.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/womensRacerbacks/customize-01.jpg',
        'images/teamwear/womensRacerbacks/customize-02.jpg',
        'images/teamwear/womensRacerbacks/customize-03.jpg',
        'images/teamwear/womensRacerbacks/customize-04.jpg',
        'images/teamwear/womensRacerbacks/customize-05.jpg',
    ];

    $lookbookTop = [
        'images/teamwear/womensRacerbacks/lookbook-01.jpg',
        'images/teamwear/womensRacerbacks/lookbook-02.jpg',
    ];

    $lookbookBottom = [
        'images/teamwear/womensRacerbacks/lookbook-03.jpg',
        'images/teamwear/womensRacerbacks/lookbook-04.jpg',
        'images/teamwear/womensRacerbacks/lookbook-05.jpg',
    ];

    $resourceCards = [
        [
            'label' => 'CUSTOM GRAPHIC DESIGN',
            'image' => 'images/teamwear/womensRacerbacks/custom-graphic-design.jpg',
            'url' => route('custom.customGraphicDesign'),
        ],
        [
            'label' => 'SHOP LIFESTYLE APPAREL',
            'image' => 'images/teamwear/womensRacerbacks/shop-lifestyle-apparel.jpg',
            'url' => route('shop.mens-tops'),
        ],
        [
            'label' => 'TEAMSTORE & DELIVERY',
            'image' => 'images/teamwear/womensRacerbacks/teamstore-delivery.jpg',
            'url' => route('custom.teamStores'),
        ],
        [
            'label' => 'EMBELLISHMENT TYPES',
            'image' => 'images/teamwear/womensRacerbacks/embellishment-types.jpg',
            'url' => route('custom.embellishment'),
        ],
        [
            'label' => 'SIZING GUIDELINES',
            'image' => 'images/teamwear/womensRacerbacks/sizing-guidelines.jpg',
            'url' => route('custom.sizingCharts'),
        ],
        [
            'label' => 'FABRICS',
            'image' => 'images/teamwear/womensRacerbacks/fabrics.jpg',
            'url' => route('custom.fabric'),
        ],
    ];
@endphp

<div class="womens-racerbacks-page">
    <section class="wr-hero" aria-label="Women's game jerseys">
        <img
            class="wr-hero__image"
            src="{{ asset('images/teamwear/womensRacerbacks/hero.webp') }}"
            alt="Encore women's custom team apparel"
        >
        <div class="wr-hero__content">
            <h1 class="wr-hero__brand">ENCORE Custom team apparel</h1>
            <p class="wr-hero__tagline">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
            <div class="wr-hero__title">WOMEN'S GAME JERSEYS</div>
        </div>
    </section>

    @foreach ($products as $index => $product)
        <section class="wr-product {{ $index % 2 === 0 ? 'wr-product--soft' : '' }} {{ $product['reverse'] ? 'wr-product--reverse' : '' }}">
            <div class="wr-product__inner" data-product-gallery>
                <div class="wr-product__media">
                    <div class="wr-product__main-wrap">
                        <img
                            class="wr-product__main"
                            src="{{ asset($product['images'][0]) }}"
                            alt="{{ $product['title'] }}"
                            data-gallery-main
                            loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                        >
                    </div>

                    <div class="wr-product__thumbs" aria-label="{{ $product['title'] }} image gallery">
                        @foreach ($product['images'] as $imageIndex => $image)
                            <button
                                type="button"
                                class="wr-product__thumb {{ $imageIndex === 0 ? 'is-active' : '' }}"
                                data-gallery-thumb
                                aria-label="View {{ $product['title'] }} image {{ $imageIndex + 1 }}"
                            >
                                <img src="{{ asset($image) }}" alt="" loading="lazy">
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="wr-product__copy">
                    <h2 class="wr-product__title">{{ $product['title'] }}</h2>
                    <p class="wr-product__description">{{ $product['description'] }}</p>

                    <ul class="wr-product__features">
                        @foreach ($product['features'] as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endforeach

    <section class="wr-customize">
        <div class="wr-customize__visual">
            <h2 class="wr-section-title">CUSTOMIZE YOUR LOOK</h2>

            <div class="wr-custom-slider" data-custom-slider>
                <div class="wr-custom-slider__viewport">
                    @foreach ($customizeImages as $imageIndex => $image)
                        <img
                            class="wr-custom-slider__slide {{ $imageIndex === 0 ? 'is-active' : '' }}"
                            src="{{ asset($image) }}"
                            alt="Women's custom lacrosse apparel design {{ $imageIndex + 1 }}"
                            loading="lazy"
                        >
                    @endforeach
                </div>

                <button type="button" class="wr-custom-slider__nav wr-custom-slider__nav--prev" data-custom-prev aria-label="Previous design">‹</button>
                <button type="button" class="wr-custom-slider__nav wr-custom-slider__nav--next" data-custom-next aria-label="Next design">›</button>
            </div>
        </div>

        <div class="wr-customize__form-wrap">
            <h2 class="wr-section-title">Get in touch</h2>

            <form class="wr-contact-form" onsubmit="event.preventDefault();">
                <label for="wr-name">Name:</label>
                <input type="text" id="wr-name" name="name" placeholder="Enter your name" required>

                <label for="wr-phone">Phone:</label>
                <input type="text" id="wr-phone" name="phone" placeholder="Enter your phone number" required>

                <label for="wr-email">Email:</label>
                <input type="email" id="wr-email" name="email" placeholder="Enter your email address" required>

                <label for="wr-message">Message:</label>
                <textarea id="wr-message" name="message" placeholder="I'M INTERESTED IN SHOOTER SHIRTS......"></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>

    <section class="wr-lookbook" aria-label="Women's apparel design gallery">
        <div class="wr-lookbook__row wr-lookbook__row--two">
            @foreach ($lookbookTop as $imageIndex => $image)
                <div class="wr-lookbook__item">
                    <img src="{{ asset($image) }}" alt="Women's lacrosse apparel inspiration {{ $imageIndex + 1 }}" loading="lazy">
                </div>
            @endforeach
        </div>

        <div class="wr-lookbook__row wr-lookbook__row--three">
            @foreach ($lookbookBottom as $imageIndex => $image)
                <div class="wr-lookbook__item">
                    <img src="{{ asset($image) }}" alt="Women's lacrosse apparel inspiration {{ $imageIndex + 3 }}" loading="lazy">
                </div>
            @endforeach
        </div>
    </section>

    <section class="wr-resource-grid" aria-label="Encore apparel resources">
        @foreach ($resourceCards as $card)
            <a class="wr-resource-card" href="{{ $card['url'] }}">
                <img src="{{ asset($card['image']) }}" alt="{{ $card['label'] }}" loading="lazy">
                <span class="wr-resource-card__label">{{ $card['label'] }}</span>
            </a>
        @endforeach
    </section>
</div>

<script>
(function () {
    document.querySelectorAll('[data-product-gallery]').forEach(function (gallery) {
        var main = gallery.querySelector('[data-gallery-main]');
        var thumbs = Array.from(gallery.querySelectorAll('[data-gallery-thumb]'));

        thumbs.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                var image = thumb.querySelector('img');
                if (!image || !main) return;

                main.src = image.src;
                thumbs.forEach(function (item) {
                    item.classList.remove('is-active');
                });
                thumb.classList.add('is-active');
            });
        });
    });

    document.querySelectorAll('[data-custom-slider]').forEach(function (slider) {
        var slides = Array.from(slider.querySelectorAll('.wr-custom-slider__slide'));
        var previous = slider.querySelector('[data-custom-prev]');
        var next = slider.querySelector('[data-custom-next]');
        var current = 0;
        var timer;

        if (slides.length < 2) return;

        function show(index) {
            current = (index + slides.length) % slides.length;
            slides.forEach(function (slide, slideIndex) {
                slide.classList.toggle('is-active', slideIndex === current);
            });
        }

        function restart() {
            window.clearInterval(timer);
            timer = window.setInterval(function () {
                show(current + 1);
            }, 5000);
        }

        previous.addEventListener('click', function () {
            show(current - 1);
            restart();
        });

        next.addEventListener('click', function () {
            show(current + 1);
            restart();
        });

        restart();
    });
})();
</script>
@endsection
