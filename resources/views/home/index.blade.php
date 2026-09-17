@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
@endpush

@section('content')
<div class="encore-home">
    {{-- Opening lacrosse film --}}
    <section class="home-video-hero" aria-label="Encore Lacrosse">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="{{ asset('videos/e592b4dab6374447b5a7252969326de8.mp4') }}" type="video/mp4">
        </video>
        <div class="home-video-shade" aria-hidden="true"></div>

        <div class="home-social-rail" aria-label="Encore social media">
            <span>Check us out</span>
            <a href="https://www.youtube.com/@encorelacrosse" target="_blank" rel="noopener" aria-label="Encore Lacrosse on YouTube">
                <i class="bi bi-youtube"></i>
            </a>
        </div>
    </section>

    {{-- Encore Custom Team Apparel --}}
    <section class="home-carousel" data-home-reveal>
        <div id="homeCustomCarousel" class="carousel slide" data-home-carousel data-interval="3000" aria-label="Encore custom team apparel showcase">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slideshow/image1.jpg') }}" alt="Encore custom team apparel" loading="eager">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow/image2.jpg') }}" alt="Encore custom team apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow/image3.JPG') }}" alt="Encore custom team apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow/image4.jpg') }}" alt="Encore custom team apparel" loading="lazy">
                </div>
            </div>

            <div class="home-carousel-copy">
                <h1>Encore Custom Team Apparel</h1>
                <p>How you look. How you feel. How you perform.</p>
                <a class="encore-button encore-button-red" href="{{ route('custom.customGraphicDesign') }}">Explore</a>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#homeCustomCarousel" data-bs-slide="prev" aria-label="Previous custom apparel slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCustomCarousel" data-bs-slide="next" aria-label="Next custom apparel slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    {{-- Event artwork row --}}
    <section class="home-events-grid" aria-label="Encore events" data-home-reveal>
        <a class="home-event-card" href="{{ route('events.battleOfTheBay') }}">
            <img src="{{ asset('images/event/battle-of-the-bay.jpg') }}" alt="The Battle of the Bay" loading="lazy">
            <span class="home-event-action">Register Now!</span>
        </a>
        <a class="home-event-card" href="{{ route('events.lasVegasLacrosseShowcase') }}">
            <img src="{{ asset('images/event/las-vegas.jpg') }}" alt="Las Vegas Lacrosse Showcase" loading="lazy">
            <span class="home-event-action">Register Now!</span>
        </a>
        <a class="home-event-card" href="{{ route('events.kingsShowcase') }}">
            <img src="{{ asset('images/event/kings-showcase.jpg') }}" alt="King's Showcase" loading="lazy">
            <span class="home-event-action">Register Now!</span>
        </a>
        <a class="home-event-card" href="{{ route('events.impact10Showcase') }}">
            <img src="{{ asset('images/event/training-event.jpg') }}" alt="Encore training event" loading="lazy">
            <span class="home-event-action">Register Now!</span>
        </a>
    </section>

    {{-- Destination events callout --}}
    <section
        class="home-registration"
        data-home-reveal
        style="background-image: linear-gradient(rgba(255,255,255,.08), rgba(255,255,255,.08)), url('{{ asset('images/IMG_9372.JPG') }}');"
    >
        <div class="home-registration-inner">
            <a
                class="encore-button encore-button-red"
                href="https://encoretournaments.leagueapps.com/tournaments"
                target="_blank"
                rel="noopener"
            >2025 Team &amp; Free Agent Registration</a>
            <p>
                Encore Lacrosse promote lacrosse culture through world class destination events –<br>
                and project based international, urban, and non-profit lacrosse development.
            </p>
        </div>
    </section>

    {{-- Encore Lifestyle --}}
    <section class="home-carousel" data-home-reveal>
        <div id="homeLifestyleCarousel" class="carousel slide" data-home-carousel data-interval="3000" aria-label="Encore lifestyle apparel showcase">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slideshow1/image1.jpg') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow1/image2.jpg') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow1/image3.jpg') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow1/image4.JPG') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow1/image5.JPG') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow1/image6.jpg') }}" alt="Encore lifestyle apparel" loading="lazy">
                </div>
            </div>

            <div class="home-carousel-copy">
                <h2>Encore Lifestyle</h2>
                <p>Explore latest lifestyle apparel for men’s / women’s and kids</p>
                <a class="encore-button encore-button-red" href="{{ route('shop.mens-tops') }}">Shop Now</a>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#homeLifestyleCarousel" data-bs-slide="prev" aria-label="Previous lifestyle slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeLifestyleCarousel" data-bs-slide="next" aria-label="Next lifestyle slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    {{-- Design / apparel film --}}
    <section class="home-film" data-home-reveal aria-label="Encore apparel film">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="{{ asset('videos/41f4c1eef4f44761be524e35064ca095.mp4') }}" type="video/mp4">
        </video>
    </section>

    {{-- Product slideshow --}}
    <section class="home-carousel product-carousel" data-home-reveal>
        <div id="homeProductCarousel" class="carousel slide" data-home-carousel data-interval="3000" aria-label="Encore featured apparel slideshow">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slideshow2/BSE Hoodie copy _1_.jpg') }}" alt="BSE Hoodie" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>BSE Hoodie</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.mens-tops') }}">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow2/Compression Short copy _1_.jpg') }}" alt="Compression Shorts" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>Compression Shorts</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.mens-bottoms') }}">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow2/Panda Vest copy _1_.jpg') }}" alt="Panda Vest" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>Panda Vest</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.mens-tops') }}">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow2/Samurai Jacket copy _1_.jpg') }}" alt="Samurai Jacket" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>Samurai Jacket</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.mens-tops') }}">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow2/Training Short copy _1_.jpg') }}" alt="Training Shorts" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>Training Shorts</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.mens-bottoms') }}">Shop Now</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slideshow2/Yoga Pant copy _1_.jpg') }}" alt="Yoga Pants" loading="lazy">
                    <div class="product-carousel-caption">
                        <h3>Yoga Pants</h3>
                        <a class="encore-button encore-button-dark" href="{{ route('shop.womens-bottoms') }}">Shop Now</a>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#homeProductCarousel" data-bs-slide="prev" aria-label="Previous product slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeProductCarousel" data-bs-slide="next" aria-label="Next product slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    {{-- Featured products --}}
    <section class="home-featured" aria-label="Featured Encore products" data-home-reveal>
        <article class="home-featured-card">
            <img src="{{ asset('images/featured 02.jpg') }}" alt="Holster Armpads" loading="lazy">
            <div class="home-featured-bar">
                <a class="encore-button encore-button-dark" href="{{ route('shop.mens-tops') }}">Shop Now</a>
                <span class="home-featured-title">Holster Armpads</span>
                <span class="home-featured-price">$ 80.00</span>
            </div>
        </article>
        <article class="home-featured-card">
            <img src="{{ asset('images/featured 01.jpg') }}" alt="Long Sleeve Shooter" loading="lazy">
            <div class="home-featured-bar">
                <a class="encore-button encore-button-dark" href="{{ route('shop.mens-tops') }}">Shop Now</a>
                <span class="home-featured-title">Long Sleeve Shooter</span>
                <span class="home-featured-price">$ 34.00</span>
            </div>
        </article>
    </section>

    {{-- Local, reusable service navigation --}}
    <section class="home-services" aria-label="Encore services" data-home-reveal>
        <a class="home-service-card" href="{{ route('custom.customGraphicDesign') }}">
            <img src="{{ asset('images/custom/customGraphicDesign/encorelacrosse_Graphic_Design_page-03.svg') }}" alt="Custom Graphic Design" loading="lazy">
            <span>Custom Graphic Design</span>
        </a>
        <a class="home-service-card" href="{{ route('shop.mens-tops') }}">
            <img src="{{ asset('images/slideshow1/image2.jpg') }}" alt="Shop Lifestyle Apparel" loading="lazy">
            <span>Shop Lifestyle Apparel</span>
        </a>
        <a class="home-service-card" href="{{ route('custom.teamStores') }}">
            <img src="{{ asset('images/custom/teamCustom/backgroundImage.webp') }}" alt="TeamStore and Delivery" loading="lazy">
            <span>TeamStore &amp; Delivery</span>
        </a>
        <a class="home-service-card" href="{{ route('custom.embellishment') }}">
            <img src="{{ asset('images/slideshow/image2.jpg') }}" alt="Embellishment Types" loading="lazy">
            <span>Embellishment Types</span>
        </a>
        <a class="home-service-card" href="{{ route('custom.sizingCharts') }}">
            <img src="{{ asset('images/featured 02.jpg') }}" alt="Sizing Guidelines" loading="lazy">
            <span>Sizing Guidelines</span>
        </a>
        <a class="home-service-card" href="{{ route('custom.fabric') }}">
            <img src="{{ asset('images/featured 01.jpg') }}" alt="Fabrics" loading="lazy">
            <span>Fabrics</span>
        </a>
    </section>

    {{-- Instagram feed intentionally excluded from this Laravel rebuild. --}}
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/pages/home.js') }}"></script>
@endpush
