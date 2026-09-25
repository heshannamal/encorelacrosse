@extends('layouts.app')

@section('content')

<!-- Hero Section (Video Background) -->
<section class="video-bg">
    <video autoplay muted loop>
        <source src="{{ asset('videos/e592b4dab6374447b5a7252969326de8.mp4') }}" type="video/mp4">
    </video>
</section>

<!-- Hero Slider Section -->
<section id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <!-- Indicators -->
    <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div> -->

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slideshow/image1.jpg') }}" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow/image2.jpg') }}" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow/image3.jpg') }}" class="d-block w-100" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow/image4.jpg') }}" class="d-block w-100" alt="Slide 4">
        </div>
        <!-- <div class="carousel-item">
            <img src="{{ asset('images/slideshow/image5.jpg') }}" class="d-block w-100" alt="Slide 5">
        </div> -->
    </div>

    <!-- Single Caption (shared across all slides) -->
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="display-5 fw-bold text-uppercase">Encore Custom Team Apparel</h1>
        <p class="lead">How you look. How you feel. How you perform.</p>
        <a href="#" class="btn btn-danger btn-lg mt-3" style="width: 300px;">EXPLORE</a>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

<!-- Event Card Section -->
{{-- <section class="event-section">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card">
                    <img src="{{ asset('images/event/battle-of-the-bay.jpg') }}" alt="Battle of the Bay" class="event-img">
                    <div class="event-button">
                        <a href="#" class="btn btn-danger btn-sm fw-semibold">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card">
                    <img src="{{ asset('images/event/las-vegas.jpg') }}" alt="Las Vegas Showcase" class="event-img">
                    <div class="event-button">
                        <a href="#" class="btn btn-danger btn-sm fw-semibold">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card">
                    <img src="{{ asset('images/event/kings-showcase.jpg') }}" alt="King's Showcase" class="event-img">
                    <div class="event-button">
                        <a href="#" class="btn btn-danger btn-sm fw-semibold">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="event-card">
                    <img src="{{ asset('images/event/training-event.jpg') }}" alt="Training Event" class="event-img">
                    <div class="event-button">
                        <a href="#" class="btn btn-danger btn-sm fw-semibold">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Image Background -->
<section class="video-bg position-relative" style="height: 100vh;">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.4);">
        <img src="{{ asset('images/IMG_9372.jpg') }}" alt="Background Image" class="w-100 h-100 object-cover">
    </div>
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative text-center">
        <a href="#" class="btn btn-danger btn-sm mb-2" style="width: 300px;">2025 TEAM & FREE AGENT REGISTRATION</a>
        <div class="text-white">
            <p class="fs-5">ENCORE LACROSSE PROMOTES LACROSSE CULTURE THROUGH WORLD CLASS DESTINATION EVENTS-</p>
            <p class="fs-5"> AND PROJECT BASED INTERNATIONAL, URBAN, AND NON-PROFIT LACROSSE DEVELOPMENT.</p>
        </div>
    </div>
</section>

<!-- Hero Slider Section -->
<section id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slideshow1/image1.jpg') }}" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow1/image2.jpg') }}" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow1/image3.jpg') }}" class="d-block w-100" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow1/image4.jpg') }}" class="d-block w-100" alt="Slide 4">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow1/image5.jpg') }}" class="d-block w-100" alt="Slide 5">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow1/image6.jpg') }}" class="d-block w-100" alt="Slide 5">
        </div>
    </div>

    <!-- Single Caption (shared across all slides) -->
    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="display-5 fw-bold text-uppercase">ENCORE Lifestyle</h1>
        <p class="lead">Explore latest lifestyle apparel for men’s / women’s and kids</p>
        <a href="#" class="btn btn-danger btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

<!-- Hero Section (Video Background) -->
<section>
    <video autoplay muted loop style="width: 100%">
        <source src="{{ asset('videos/41f4c1eef4f44761be524e35064ca095.mp4') }}" type="video/mp4">
    </video>
</section>

<!-- Hero Slider Section -->
<section id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slideshow2/BSE Hoodie copy _1_.jpg') }}" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>BSE Hoodie</h5>
                <a href="/shop/bse-hoodie" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow2/Compression Short copy _1_.jpg') }}" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Compression Shorts</h5>
                <a href="/shop/compression-shorts" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow2/Panda Vest copy _1_.jpg') }}" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Panda Vest</h5>
                <a href="/shop/panda-vest" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow2/Samurai Jacket copy _1_.jpg') }}" class="d-block w-100" alt="Slide 4">
            <div class="carousel-caption d-none d-md-block">
                <h5>Samurai Jacket</h5>
                <a href="/shop/samurai-jacket" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow2/Training Short copy _1_.jpg') }}" class="d-block w-100" alt="Slide 5">
            <div class="carousel-caption d-none d-md-block">
                <h5>Training Shorts</h5>
                <a href="/shop/training-shorts" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slideshow2/Yoga Pant copy _1_.jpg') }}" class="d-block w-100" alt="Slide 6">
            <div class="carousel-caption d-none d-md-block">
                <div class="carousel-caption d-flex justify-content-center align-items-center">
                    <h5>Yoga Pants</h5>
                    <a href="/shop/yoga-pants" class="btn btn-secondary btn-lg mt-3" style="width: 300px;">SHOP NOW</a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</section>

<section>
  <div class="row g-0">

    <!-- Product 1 -->
    <div class="col-12 col-md-6 position-relative">
      <img src="images/featured 02.jpg" alt="Holster Armpads" class="img-fluid w-100" />
      {{-- <div class="d-flex justify-content-between align-items-center bg-white bg-opacity-75 py-2 px-3 position-absolute bottom-0 w-100">
        <a href="#" class="btn btn-dark btn-sm text-uppercase fw-semibold">Shop Now</a>
        <span class="flex-grow-1 text-center fw-semibold">HOLSTER ARMPADS</span>
        <span class="fw-semibold">$80.00</span>
      </div> --}}
    </div>

    <!-- Product 2 -->
    <div class="col-12 col-md-6 position-relative">
      <img src="images/featured 01.jpg" alt="Long Sleeve Shooter" class="img-fluid w-100" />
      {{-- <div class="d-flex justify-content-between align-items-center bg-white bg-opacity-75 py-2 px-3 position-absolute bottom-0 w-100">
        <a href="#" class="btn btn-dark btn-sm text-uppercase fw-semibold">Shop Now</a>
        <span class="flex-grow-1 text-center fw-semibold">LONG SLEEVE SHOOTER</span>
        <span class="fw-semibold">$34.00</span>
      </div> --}}
    </div>
  </div>
</section>

@include('components.servicesCarousel')

<!-- Instagram -->
@include('components.instagram')

@endsection
