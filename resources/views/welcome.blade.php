@extends('layouts.app')

@section('content')
<div class="encore-home">
    <section class="home-opening-hero" aria-label="Encore Lacrosse">
        <video autoplay muted loop playsinline preload="metadata" poster="{{ asset('images/event/theBattleOfTheBay/backgroundImage.JPG') }}">
            <source src="{{ asset('videos/e592b4dab6374447b5a7252969326de8.mp4') }}" type="video/mp4">
        </video>
        <div class="home-opening-shade"></div>

        <div class="hero-social-rail" aria-hidden="true">
            <span>ENCORE LACROSSE</span>
            <i class="bi bi-youtube"></i>
        </div>

        <div class="event-countdown-strip">
            <div class="event-countdown-title">
                <i class="bi bi-calendar2-event"></i>
                <div><strong>Upcoming</strong><span>Encore Events</span></div>
            </div>
            <div class="event-countdown-item" data-event-date="2025-11-01">
                <span>Vegas Lacrosse Showcase</span>
                <strong class="countdown-days">--</strong>
                <small>Days</small>
                <em>November 1 &amp; 2, 2025</em>
            </div>
            <div class="event-countdown-item" data-event-date="2026-01-24">
                <span>King's Showcase</span>
                <strong class="countdown-days">--</strong>
                <small>Days</small>
                <em>January 24 &amp; 25, 2026</em>
            </div>
            <div class="event-countdown-item" data-event-date="2026-06-06">
                <span>The Battle Of The Bay</span>
                <strong class="countdown-days">--</strong>
                <small>Days</small>
                <em>June 6 &amp; 7, 2026</em>
            </div>
        </div>
    </section>

    <section class="showcase-hero custom-team-showcase" aria-label="Encore custom team apparel">
        <div id="customTeamCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="4500">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100"><img src="{{ asset('images/slideshow/image1.jpg') }}" alt="Encore custom lacrosse apparel"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow/image2.jpg') }}" alt="Encore teamwear"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow/image3.JPG') }}" alt="Encore custom uniforms"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow/image4.jpg') }}" alt="Encore lacrosse players"></div>
            </div>
        </div>
        <div class="showcase-overlay"></div>
        <div class="showcase-copy text-white text-center">
            <h1>Encore Custom Team Apparel</h1>
            <p>How you look. How you feel. How you perform.</p>
            <a href="{{ route('teamwear.allTeamwear') }}" class="encore-btn encore-btn-red">Explore</a>
        </div>
    </section>

    <section class="event-card-grid" aria-label="Encore events">
        <a class="event-tile" href="{{ route('events.battleOfTheBay') }}">
            <img src="{{ asset('images/event/battle-of-the-bay.jpg') }}" alt="Battle of the Bay">
            <span>View Event</span>
        </a>
        <a class="event-tile" href="{{ route('events.lasVegasLacrosseShowcase') }}">
            <img src="{{ asset('images/event/las-vegas.jpg') }}" alt="Las Vegas Lacrosse Showcase">
            <span>View Event</span>
        </a>
        <a class="event-tile" href="{{ route('events.kingsShowcase') }}">
            <img src="{{ asset('images/event/kings-showcase.jpg') }}" alt="King's Showcase">
            <span>View Event</span>
        </a>
        <a class="event-tile" href="{{ route('privateTraining') }}">
            <img src="{{ asset('images/event/training-event.jpg') }}" alt="Encore training event">
            <span>Explore Training</span>
        </a>
    </section>

    <section class="registration-callout">
        <div class="registration-content">
            <a href="https://encoretournaments.leagueapps.com/tournaments" target="_blank" rel="noopener" class="encore-btn encore-btn-red registration-btn">
                2025 Team &amp; Free Agent Registration
            </a>
            <p>
                Encore Lacrosse promote lacrosse culture through world class destination events –<br class="d-none d-md-block">
                and project based international, urban, and non-profit lacrosse development.
            </p>
        </div>
    </section>

    <section class="showcase-hero lifestyle-showcase" aria-label="Encore lifestyle apparel">
        <div id="lifestyleCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="4800">
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100"><img src="{{ asset('images/slideshow1/image1.jpg') }}" alt="Encore lifestyle apparel"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow1/image2.jpg') }}" alt="Encore lifestyle collection"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow1/image3.jpg') }}" alt="Encore sports lifestyle"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow1/image4.JPG') }}" alt="Encore apparel"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow1/image5.JPG') }}" alt="Encore lifestyle"></div>
                <div class="carousel-item h-100"><img src="{{ asset('images/slideshow1/image6.jpg') }}" alt="Encore lifestyle gear"></div>
            </div>
        </div>
        <div class="showcase-overlay lifestyle-overlay"></div>
        <div class="showcase-copy text-white text-center">
            <h2>Encore Lifestyle</h2>
            <p>Explore latest lifestyle apparel for men's / women's and kids</p>
            <a href="{{ route('shop.mens-tops') }}" class="encore-btn encore-btn-red">Shop Now</a>
        </div>
    </section>

    <section class="design-film" aria-label="Encore apparel design process">
        <video autoplay muted loop playsinline preload="metadata">
            <source src="{{ asset('videos/41f4c1eef4f44761be524e35064ca095.mp4') }}" type="video/mp4">
        </video>
    </section>

    <section class="training-short-hero" aria-label="Women's Training Short">
        <img src="{{ asset('images/slideshow2/Training Short copy _1_.jpg') }}" alt="Women's Training Short">
        <div class="training-short-copy">
            <h2>Women's Training Short</h2>
            <a href="{{ route('shop.womens-bottoms') }}" class="encore-btn encore-btn-dark">Shop Now</a>
        </div>
    </section>

    <section class="featured-products" aria-label="Featured products">
        <article class="featured-product">
            <img src="{{ asset('images/featured 02.jpg') }}" alt="Holster Armpads">
            <div class="featured-product-bar">
                <a href="{{ route('shop.mens-tops') }}" class="encore-btn encore-btn-dark">Shop Now</a>
                <h3>Holster<br>Armpads</h3>
                <span class="featured-divider"></span>
                <strong>$ 80.00</strong>
            </div>
        </article>

        <article class="featured-product">
            <img src="{{ asset('images/featured 01.jpg') }}" alt="Long Sleeve Shooter">
            <div class="featured-product-bar">
                <a href="{{ route('shop.mens-tops') }}" class="encore-btn encore-btn-dark">Shop Now</a>
                <h3>Long Sleeve<br>Shooter</h3>
                <span class="featured-divider"></span>
                <strong>$ 34.00</strong>
            </div>
        </article>
    </section>

    @include('components.servicesCarousel')
    @include('components.instagram-placeholder')
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush
