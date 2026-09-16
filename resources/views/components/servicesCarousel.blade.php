{{-- Encore Lacrosse Services Carousel Section --}}
<section class="py-4">
    <div class="container-fluid px-3">
        <div class="row g-1">
            {{-- Custom Graphic Design --}}
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card border-0 overflow-hidden position-relative service-card">
                    <img src="https://ucarecdn.com/2f7356f7-c7c9-4cc1-8f32-086f0abae371/-/format/auto/-/preview/3000x3000/-/quality/lighter/Design%20copy.jpg"
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
                    <img src="https://ucarecdn.com/c056f0f4-44a5-40cc-baed-1d6a21112240/-/format/auto/-/preview/3000x3000/-/quality/lighter/Shop%20copy.jpg"
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
                    <img src="https://ucarecdn.com/4697da7c-58b1-43f8-a6c6-57fd05969643/-/format/auto/-/preview/3000x3000/-/quality/lighter/TeamSore%20copy.jpg"
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
                    <img src="https://ucarecdn.com/77f7b45b-f59f-4630-b76c-015b5b870df6/-/format/auto/-/preview/3000x3000/-/quality/lighter/Embellishment2.jpg"
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
                    <img src="https://ucarecdn.com/28983e22-f786-4144-8727-5038bb424dc3/-/format/auto/-/preview/3000x3000/-/quality/lighter/Sizing%20copy.jpg"
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
                    <img src="https://ucarecdn.com/f452a03f-1922-4ce0-a4a3-5353d40976be/-/format/auto/-/preview/3000x3000/-/quality/lighter/Fabric%20copy.jpg"
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