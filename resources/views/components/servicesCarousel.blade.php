{{-- Encore Lacrosse Services Carousel Section --}}
<section class="py-4">
    <div class="container-fluid px-3">
        <div class="row g-1">
            {{-- Custom Graphic Design --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/custom-graphic-design.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="Custom Graphic Design"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="{{ route('custom.customGraphicDesign') }}" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            Custom Graphic Design
                        </a>
                    </div>
                </div>
            </div>

            {{-- Shop Lifestyle Apparel --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/shop-lifestyle-apparel.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="Shop Lifestyle Apparel"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="https://encorecustom.com/" target="_blank" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            Shop Lifestyle Apparel
                        </a>
                    </div>
                </div>
            </div>

            {{-- TeamStore & Delivery --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/team-store-delivery.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="TeamStore & Delivery"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="{{ route('custom.teamStores') }}" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            TeamStore &amp; Delivery
                        </a>
                    </div>
                </div>
            </div>

            {{-- Embellishment Types --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/embellishment-types.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="Embellishment Types"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="{{ route('custom.embellishment') }}" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            Embellishment Types
                        </a>
                    </div>
                </div>
            </div>

            {{-- Sizing Guidelines --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/sizing-guidelines.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="Sizing Guidelines"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="{{ route('custom.sizingCharts') }}" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            Sizing Guidelines
                        </a>
                    </div>
                </div>
            </div>

            {{-- Fabrics --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="{{ asset('images/services-carousel/fabrics.jpg') }}"
                        class="card-img object-fit-cover"
                        alt="Fabrics"
                        style="height: 265px;">
                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-2 overlay-gradient">
                        <a href="{{ route('custom.fabric') }}" class="btn btn-light btn-sm w-100 text-uppercase fw-semibold stretched-link service-btn">
                            Fabrics
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .service-card {
        transition: transform 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-3px);
    }

    .service-card .card-img {
        transition: transform 0.3s ease;
    }

    .service-card:hover .card-img {
        transform: scale(1.08);
    }

    .overlay-gradient {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.3) 0%, transparent 100%);
    }

    .service-btn {
        font-size: 0.65rem;
        padding: 0.4rem 0.5rem;
        letter-spacing: 0.5px;
        line-height: 1.2;
        white-space: normal;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .service-btn:hover {
        transform: scale(1.02);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 991px) {
        .service-card img {
            height: 220px !important;
        }
    }

    @media (max-width: 767px) {
        .service-card img {
            height: 200px !important;
        }

        .service-btn {
            font-size: 0.6rem;
            padding: 0.35rem 0.4rem;
        }
    }
</style>
@endpush