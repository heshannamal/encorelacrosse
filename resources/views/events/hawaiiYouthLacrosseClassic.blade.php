@extends('layouts.app')

@section('content')

@php
$image4 = asset('images/event/hawaiiYouthLacrosseClassic/image4.avif');
$image5 = asset('images/event/hawaiiYouthLacrosseClassic/image5.avif');
$image6 = asset('images/event/hawaiiYouthLacrosseClassic/image6.avif');
$image7 = asset('images/event/hawaiiYouthLacrosseClassic/image7.avif');
$image8 = asset('images/event/hawaiiYouthLacrosseClassic/image8.avif');
$image9 = asset('images/event/hawaiiYouthLacrosseClassic/image9.avif');
$image10 = asset('images/event/hawaiiYouthLacrosseClassic/image10.avif');
$image11 = asset('images/event/hawaiiYouthLacrosseClassic/image11.avif');
$image12 = asset('images/event/hawaiiYouthLacrosseClassic/image12.avif');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ asset('images/event/hawaiiYouthLacrosseClassic/backgroundImage.avif') }}"
                class="img-fluid w-100"
                alt="Hawaii Lacrosse Classic Background"
                style="object-fit: cover; height: 80vh; width: fit-content;">

            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" style="z-index: 10;">
                <img src="{{ asset('images/event/hawaiiYouthLacrosseClassic/backgroundImage2.avif') }}"
                    class="img-fluid"
                    alt="Hawaii Youth Lacrosse Classic Logo"
                    style="max-width: 80%; max-height: 80%;">
            </div>
        </div>
    </div>
</section>

<section class="container py-5" style="font-family: 'Steelfish Regular', Oswald, HelveticaNeue, 'Helvetica Neue', sans-serif;">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <h2 class="display-5 mb-3">
                DETAILS
            </h2>
            <p class="lead px-lg-5 mx-lg-5">
                Join us in Paradise for the 3rd annual Hawaii Lacrosse Classic. Play lacrosse less than 150 yards from the beach in beautiful Waikiki. Hotel accommodation concierge will make your travel booking easy, affordable, and an unforgettable experience!
            </p>
        </div>
    </div>

    <div class="row justify-content-center text-center mb-5">

        <div class="col-12 col-md-4 mb-4 mb-md-0">
            <h4 class="text-danger">Location:</h4>
            <p class="mb-0">Kapiolani Park</p>
            <p class="mb-0">3840 Paki Ave</p>
            <p class="mb-0">Honolulu, HI 96815</p>
        </div>

        <div class="col-12 col-md-4 mb-4 mb-md-0">
            <h4 class="text-danger">Divisions:</h4>
            <p class="mb-0">• HS Boys</p>
        </div>

        <div class="col-12 col-md-4">
            <h4 class="text-danger">Price:</h4>
            <p class="mb-0">• $1200/team</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto">
            <a href="#" class="btn btn-success btn-lg px-5 py-3 shadow-sm">
                Registration - Coming Soon!
            </a>
        </div>
    </div>
</section>

<hr>

<section class="py-5 bg-white" style="font-family: 'Steelfish Regular', Oswald, HelveticaNeue, 'Helvetica Neue', sans-serif;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <!-- Main Heading -->
                <h2 class="text-dark fw-bold text-uppercase display-6 mb-4">HOTELS</h2>

                <!-- Contact Description -->
                <p class="mb-4 text-muted">
                    Contact Hotel Director Scott Adams to reserve a discounted hotel block
                </p>

                <!-- Logo/Image Section -->
                <div class="mb-4">
                    <!-- Placeholder image matching the visual style -->
                    <img src="{{ asset('images/event/theBattleOfTheBay/spoLogo.png') }}" alt="Sports Rooms 4 You Logo" class="img-fluid rounded-3 border p-3 shadow-sm" style="max-width: 200px;">
                    <br>
                    <small class="d-block mt-2 text-dark fw-bold">sportsrooms4you.com</small>
                </div>

                <!-- Contact Details -->
                <div class="mb-5">
                    <p class="mb-0 fw-semibold text-dark">Scott Adams</p>
                    <p class="mb-0 text-dark">dscott@sportsrooms4you.com</p>
                    <p class="mb-0 text-dark">408-560-1938</p>
                </div>

                <!-- Contact Button -->
                <div>
                    <a href="mailto:dscott@sportsrooms4you.com" class="btn btn-danger btn-lg text-uppercase px-5 py-3 shadow-lg" style="max-width: 380px;">
                        Contact Hotel Agent
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<hr>

<section class="container py-5">
    <div class="row justify-content-center text-center mb-5">
        
        <div class="col-12 col-md-4 mb-4">
            <h3 class="fw-bold mb-3 text-uppercase">Queen Kapiolani</h3>
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/event/hawaiiYouthLacrosseClassic/image1.avif') }}" class="card-img-top" alt="Queen Kapiolani Hotel">
                <div class="card-body text-start">
                    <p class="card-text">
                        <strong>Specials</strong> - Room Extras • Wi-Fi • Mini Fridge • Beach Towels & Chairs • Business Center • Flow water filling station • Bike Rental service • Tour Services • Kulana Terrace Restaurant • The Deck Waikiki Pool Bar • Gift Shop • Less than 1 mile from fields (closest location) • 1 block from Waikiki Beach
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-4">
            <h3 class="fw-bold mb-3 text-uppercase">Aston Waikiki</h3>
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/event/hawaiiYouthLacrosseClassic/image2.avif') }}" class="card-img-top" alt="Aston Waikiki Hotel">
                <div class="card-body text-start">
                    <p class="card-text">
                        <strong>Specials</strong> - Room Extras • Wi-Fi & DSL • Coffee Maker • Fitness center • Play Station • Daily Newspaper • Beach Bag amenity • On Site Tiki's Grill & Bar, Wolfgang Puck's Express, Subway, Jamba Juice, Cookie Corner, Ku'Ai Market • Less than 1 mile from fields, across the street from Waikiki Beach.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 mb-4">
            <h3 class="fw-bold mb-3 text-uppercase">Hyatt Place</h3>
            <div class="card border-0 shadow-sm">
                <img src="{{ asset('images/event/hawaiiYouthLacrosseClassic/image3.avif') }}" class="card-img-top" alt="Hyatt Place Hotel">
                <div class="card-body text-start">
                    <p class="card-text">
                        <strong>Specials</strong> - Room Extras • NO RESORT FEES • Comp Wi-Fi & DSL • Mini Fridge • Coffee/Tea maker • Happy Hour 4-7pm • A/V Station • 24 hour Gym • Business Center • 24 Menu & market • Less than 1 mile from fields • Connecting rooms available • Less than $1/4$ mile from Waikiki Beach
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            
            <h3 class="text-center mb-3">
                Hawaii Youth Lacrosse Classic Promo Video
            </h3>
            
            <div class="ratio ratio-16x9 shadow-lg rounded-3">
                <iframe 
                    src="https://www.youtube.com/embed/XFd0_LX-T44" 
                    title="Hawaii Youth Lacrosse Classic Promo Video" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
            
        </div>
    </div>
</section>

<style>
    .img-cover {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>

<section id="sf-attractions" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 text-white py-5" style="background-image: url('{{ $image4 }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; min-height: 500px; background-blend-mode: multiply;">
            <div class="container text-center pt-3 pb-5">
                <h2 class="display-6 fw-bold text-uppercase text-danger underline" style="text-shadow: 1px 1px 3px #000;">
                    LOCAL SAN FRANCISCO ATTRACTIONS
                </h2>
            </div>

            <div class="container pb-5">
                <div class="row row-cols-2 row-cols-md-3 g-3 g-md-4 justify-content-center">

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image5 }}" alt="Alcatraz" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image6 }}" alt="Cable Car" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image7 }}" alt="Coit Tower" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image8 }}" alt="Fisherman's Wharf" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image9 }}" alt="Golden Gate Bridge" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image10 }}" alt="Painted Ladies" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection