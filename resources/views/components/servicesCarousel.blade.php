{{-- Encore Lacrosse Services Carousel Section --}}
@php
    $servicesCarouselItems = [
        [
            'title' => 'Custom Graphic Design',
            'image' => asset('images/services-carousel/custom-graphic-design.jpg'),
            'url' => route('custom.customGraphicDesign'),
            'external' => false,
        ],
        [
            'title' => 'Shop Lifestyle Apparel',
            'image' => asset('images/services-carousel/shop-lifestyle-apparel.jpg'),
            'url' => 'https://encorecustom.com/',
            'external' => true,
        ],
        [
            'title' => 'TeamStore & Delivery',
            'image' => asset('images/services-carousel/team-store-delivery.jpg'),
            'url' => route('custom.teamStores'),
            'external' => false,
        ],
        [
            'title' => 'Embellishment Types',
            'image' => asset('images/services-carousel/embellishment-types.jpg'),
            'url' => route('custom.embellishment'),
            'external' => false,
        ],
        [
            'title' => 'Sizing Guidelines',
            'image' => asset('images/services-carousel/sizing-guidelines.jpg'),
            'url' => route('custom.sizingCharts'),
            'external' => false,
        ],
        [
            'title' => 'Fabrics',
            'image' => asset('images/services-carousel/fabrics.jpg'),
            'url' => route('custom.fabric'),
            'external' => false,
        ],
    ];
@endphp

<section class="services-carousel-section py-4" aria-label="Encore services">
    <div class="container-fluid px-3">
        <div class="services-carousel-viewport">
            <div class="services-carousel-track">
                @foreach([false, true] as $duplicateSet)
                    <div
                        class="services-carousel-set"
                        @if($duplicateSet) aria-hidden="true" @endif
                    >
                        @foreach($servicesCarouselItems as $service)
                            <div class="services-carousel-item">
                                <div class="card border-0 overflow-hidden position-relative service-card">
                                    <img
                                        src="{{ $service['image'] }}"
                                        class="card-img object-fit-cover"
                                        alt="{{ $duplicateSet ? '' : $service['title'] }}"
                                        loading="lazy"
                                    >

                                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                                        <a
                                            href="{{ $service['url'] }}"
                                            class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn"
                                            @if($service['external']) target="_blank" rel="noopener noreferrer" @endif
                                            @if($duplicateSet) tabindex="-1" @endif
                                        >
                                            {{ $service['title'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .services-carousel-viewport {
        width: 100%;
        overflow: hidden;
    }

    .services-carousel-track {
        display: flex;
        width: max-content;
        will-change: transform;
        animation: encoreServicesLoop 34s linear infinite;
    }

    .services-carousel-set {
        display: flex;
        flex-shrink: 0;
        gap: 4px;
        padding-right: 4px;
    }

    .services-carousel-item {
        flex: 0 0 calc((100vw - 56px) / 6);
        width: calc((100vw - 56px) / 6);
        min-width: 190px;
    }

    .service-card {
        height: 265px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
    }

    .service-card .card-img {
        width: 100%;
        height: 265px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card:hover .card-img {
        transform: scale(1.08);
    }

    .overlay-gradient {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.32) 0%, transparent 72%);
    }

    .service-btn {
        font-size: 0.65rem;
        padding: 0.4rem 0.5rem;
        letter-spacing: 0.5px;
        line-height: 1.2;
        white-space: normal;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .service-btn:hover {
        transform: scale(1.02);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }

    .services-carousel-viewport:hover .services-carousel-track,
    .services-carousel-viewport:focus-within .services-carousel-track {
        animation-play-state: paused;
    }

    @keyframes encoreServicesLoop {
        from {
            transform: translate3d(0, 0, 0);
        }

        to {
            transform: translate3d(-50%, 0, 0);
        }
    }

    @media (max-width: 991.98px) {
        .services-carousel-item {
            flex-basis: calc((100vw - 44px) / 3);
            width: calc((100vw - 44px) / 3);
            min-width: 220px;
        }

        .service-card,
        .service-card .card-img {
            height: 220px;
        }

        .services-carousel-track {
            animation-duration: 30s;
        }
    }

    @media (max-width: 767.98px) {
        .services-carousel-item {
            flex-basis: calc((100vw - 38px) / 2);
            width: calc((100vw - 38px) / 2);
            min-width: 160px;
        }

        .service-card,
        .service-card .card-img {
            height: 200px;
        }

        .service-btn {
            font-size: 0.6rem;
            padding: 0.35rem 0.4rem;
        }

        .services-carousel-track {
            animation-duration: 26s;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .services-carousel-track {
            animation: none;
        }

        .services-carousel-viewport {
            overflow-x: auto;
            scrollbar-width: thin;
        }
    }
</style>
@endpush
