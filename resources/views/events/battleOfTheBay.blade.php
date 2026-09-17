@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/event/theBattleOfTheBay/backgroundImage.JPG');
$spoLogo = asset('images/event/theBattleOfTheBay/spoLogo.png');
$image1 = asset('images/event/theBattleOfTheBay/image1.avif');
$image2a = asset('images/event/theBattleOfTheBay/image2a.avif');
$image2b = asset('images/event/theBattleOfTheBay/image2b.avif');
$image2c = asset('images/event/theBattleOfTheBay/image2c.jpg');
$image3 = asset('images/event/theBattleOfTheBay/image3.avif');
$image4 = asset('images/event/theBattleOfTheBay/image4.avif');
$image5 = asset('images/event/theBattleOfTheBay/image5.avif');
$image6 = asset('images/event/theBattleOfTheBay/image6.avif');
$image7 = asset('images/event/theBattleOfTheBay/image7.avif');
$image8 = asset('images/event/theBattleOfTheBay/image8.avif');
$image9 = asset('images/event/theBattleOfTheBay/image9.avif');
$video1 = asset('images/event/theBattleOfTheBay/a7c0c065599d445fb3133a9125e1ef00.mp4');
$video2 = asset('images/event/theBattleOfTheBay/5f97f2707ff545268dafb1e0b5e0aeca.mp4');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <!-- <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="mt-3" style="font-weight: 700; text-transform: uppercase;">
                    THE BATTLE OF THE BAY
                </h1>
                <p style="font-size: 1.5rem; line-height: 1.5;">
                    JULY 26 - AUGUST 5, 2024 | SAN FRANCISCO, CA TO MANILA, PHILIPPINES
                </p>
            </div> -->
        </div>
    </div>
</section>

<section>
    <div class="py-5 bg-light">
        <div class="container py-5">

            <div class="text-center mb-5">
                <h1 class="text-danger fw-bold text-uppercase">EVENT DETAILS</h1>
                <p class="lead text-secondary">San Francisco</p>
            </div>

            <div class="row g-5">

                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body p-4">
                            <h2 class="card-title h4 mb-4">
                                <span class="text-danger fw-bold me-2">•</span> Locations
                            </h2>

                            <!-- Polo Fields Location -->
                            <div class="mb-5">
                                <h5 class="fw-bold">Polo Fields</h5>
                                <p class="text-muted mb-3">
                                    1232 John F Kennedy Dr<br>
                                    San Francisco, CA 94121
                                </p>

                                <div class="map-container border rounded overflow-hidden mb-2">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.2519961623916!2d-122.4839843846824!3d37.77092327975878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808587ab508006b9%3A0x8e83b4c19a97d740!2sGolden%20Gate%20Park%20Polo%20Field!5e0!3m2!1sen!2sus!4v1638200000000!5m2!1sen!2sus"
                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                    </iframe>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="small text-decoration-none text-primary">View larger map</a>
                                </div>
                            </div>

                            <!-- Beach Chalet Location -->
                            <div class="mt-5 pt-3 border-top">
                                <h5 class="fw-bold">Beach Chalet</h5>
                                <p class="text-muted mb-3">
                                    1400 John F Kennedy Dr<br>
                                    San Francisco, CA 94121
                                </p>

                                <div class="map-container border rounded overflow-hidden mb-2">
                                    <!-- Using a different map link for distinction -->
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1576.6342618012656!2d-122.51000207865245!3d37.76812852278453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808587c674251a25%3A0xc31245672f5e0427!2sBeach%20Chalet%20Brewery%20and%20Restaurant!5e0!3m2!1sen!2sus!4v1678828800000!5m2!1sen!2sus"
                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                    </iframe>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="small text-decoration-none text-primary">View larger map</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6">

                    <!-- Boys Divisions Card -->
                    <div class="card shadow-sm mb-5 border-0">
                        <div class="card-body p-4">
                            <h2 class="card-title h4 mb-4">
                                <span class="text-danger fw-bold me-2">•</span> Boys Divisions
                            </h2>

                            <div class="row g-3">
                                @php
                                $divisions = [
                                ['name' => 'HS Elite', 'year' => '(2027-2029)'],
                                ['name' => 'HS Open', 'year' => '(2027-2030)'],
                                ['name' => 'HS Rise', 'year' => '(2027-2030)'],
                                ['name' => 'Boys 2030', 'year' => ''],
                                ['name' => 'Boys 2031', 'year' => ''],
                                ['name' => 'Boys 2032', 'year' => ''],
                                ['name' => 'Boys 2033-2034', 'year' => ''],
                                ['name' => 'Boys 10U', 'year' => '(2035-2036)'],
                                ];
                                @endphp

                                @foreach($divisions as $division)
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-secondary w-100 p-3 text-center d-block rounded-3 shadow-sm">
                                        <div class="fw-bold text-dark">{{ $division['name'] }}</div>
                                        @if($division['year'])
                                        <small class="text-muted">{{ $division['year'] }}</small>
                                        @endif
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Registration Pricing Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h2 class="card-title h4 mb-4">
                                <span class="text-danger fw-bold me-2">•</span> Registration Pricing
                            </h2>

                            <h5 class="fw-bold text-dark mb-3">Standard Divisions</h5>
                            <div class="row align-items-center py-2 border-bottom">
                                <div class="col-8">
                                    <p class="mb-0">Team Registration</p>
                                </div>
                                <div class="col-4 text-end">
                                    <h5 class="text-danger fw-bold mb-0">$2,250</h5>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 mb-4 border-bottom">
                                <div class="col-8">
                                    <p class="mb-0">Free Agents</p>
                                </div>
                                <div class="col-4 text-end">
                                    <h5 class="text-danger fw-bold mb-0">$195</h5>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-3 mt-4">Boys U10 Division</h5>
                            <div class="row align-items-center py-2 border-bottom">
                                <div class="col-8">
                                    <p class="mb-0">Team Registration</p>
                                </div>
                                <div class="col-4 text-end">
                                    <h5 class="text-danger fw-bold mb-0">$1,850</h5>
                                </div>
                            </div>
                            <div class="row align-items-center py-2">
                                <div class="col-8">
                                    <p class="mb-0">Free Agents</p>
                                </div>
                                <div class="col-4 text-end">
                                    <h5 class="text-danger fw-bold mb-0">$150</h5>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-danger btn-lg text-uppercase fw-bold shadow-lg" style="padding: 1rem 4rem; max-width: 300px;">
                        Register Here
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <!-- Video Sections Container -->
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Video Section: BATTLE OF THE BAY 2024 -->
                <div class="mb-5 pb-5">
                    <div class="text-center mb-4">
                        <h2 class="text-dark fw-bold text-uppercase display-6">BATTLE OF THE BAY 2024</h2>
                    </div>
                    <div class="ratio ratio-16x9 shadow-lg rounded-3 overflow-hidden border border-1 border-light">
                        <video id="video2024" controls autoplay loop muted playsinline class="w-100 h-100 object-cover" style="object-fit: cover;">
                            <source src="{{ $video1 }}" type="video/mp4">
                        </video>

                    </div>
                </div>

                <!-- Video Section: BATTLE OF THE BAY 2023 -->
                <div class="mb-5 pb-5">
                    <div class="text-center mb-4">
                        <h2 class="text-dark fw-bold text-uppercase display-6">BATTLE OF THE BAY 2023</h2>
                    </div>
                    <div class="ratio ratio-16x9 shadow-lg rounded-3 overflow-hidden border border-1 border-light">
                        <video id="video2023" controls autoplay loop muted playsinline class="w-100 h-100 object-cover" style="object-fit: cover;">
                            <source src="{{ $video2 }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row g-5 justify-content-center">

            <!-- 2018 MEMORIES Column -->
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h2 class="text-dark fw-bold text-uppercase display-6 fs-3">2018 MEMORIES</h2>
                </div>

                <!-- Responsive Video Embed for 2018 -->
                <div class="ratio ratio-16x9 shadow-lg rounded-3 overflow-hidden border border-1 border-light">
                    <!-- Placeholder: Replace src with the actual YouTube embed link for 2018 -->
                    <iframe
                        src="https://www.youtube.com/embed/Tfaw6hapwwM?controls=1&rel=0"
                        title="2018 Battle of the Bay Highlights"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="border:0;">
                    </iframe>
                </div>
            </div>

            <!-- 2016 MEMORIES Column -->
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h2 class="text-dark fw-bold text-uppercase display-6 fs-3">2016 MEMORIES</h2>
                </div>

                <!-- Responsive Video Embed for 2016 -->
                <div class="ratio ratio-16x9 shadow-lg rounded-3 overflow-hidden border border-1 border-light">
                    <!-- Placeholder: Replace src with the actual YouTube embed link for 2016 -->
                    <iframe
                        src="https://www.youtube.com/embed/Nf6iLZkbCxA?controls=1&rel=0"
                        title="2016 Battle of the Bay Highlights"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="border:0;">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
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
                    <img src="{{ $spoLogo }}" alt="Sports Rooms 4 You Logo" class="img-fluid rounded-3 border p-3 shadow-sm" style="max-width: 200px;">
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
                    <a href="mailto:dscott@sportsrooms4you.com" class="btn btn-danger btn-lg text-uppercase fw-bold px-5 py-3 rounded-3 shadow-lg" style="max-width: 380px;">
                        Contact Hotel Agent
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container py-5">

        <div class="row g-4">

            <!-- Holiday Inn Card -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img
                        src="{{ $image2a }}"
                        class="card-img-top"
                        alt="Holiday Inn Pool area">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center text-uppercase fw-bold mb-3">HOLIDAY INN</h4>

                        <!-- Collapsible Header -->
                        <div class="d-flex justify-content-between align-items-center cursor-pointer mb-3" data-bs-toggle="collapse" data-bs-target="#holidayInnDetails" aria-expanded="false" aria-controls="holidayInnDetails">
                            <span class=" fw-bold">More Hotel Info</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down " viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>

                        <!-- Collapse Content -->
                        <div class="collapse" id="holidayInnDetails">
                            <div class="card-text">
                                <p class="text-sm mb-1 fw-bold">2 miles from fields</p>
                                <p class="mb-2"><strong>Holiday Inn Golden Gateway</strong></p>
                                <p class="mb-2">Contact Hotel Director for Pricing</p>
                                <p class="mb-3 fw-bold ">Two Double beds or One King bed</p>
                                <p class="text-muted small">
                                    Located in the heart of the Marina district, close to many amenities and the tournament fields.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Marriott Wharf Card -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img
                        src="{{ $image2b }}"
                        class="card-img-top"
                        alt="Marriott Fisherman's Wharf at night">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center text-uppercase fw-bold mb-3">MARRIOTT-WHARF</h4>

                        <!-- Collapsible Header -->
                        <div class="d-flex justify-content-between align-items-center cursor-pointer mb-3" data-bs-toggle="collapse" data-bs-target="#marriottDetails" aria-expanded="false" aria-controls="marriottDetails">
                            <span class=" fw-bold">More Hotel Info</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down " viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>

                        <!-- Collapse Content -->
                        <div class="collapse" id="marriottDetails">
                            <div class="card-text">
                                <p class="text-sm mb-1 fw-bold">6.5 miles from fields</p>
                                <p class="mb-2">San Francisco Marriott Fisherman's Wharf</p>
                                <p class="mb-3 fw-bold ">Contact Hotel Director for Pricing</p>
                                <p class="text-muted small">
                                    Located near world-famous attractions, and Fisherman's Wharf. On-site eatery, Red Fin Restaurant, for lunch, dinner and evening cocktails.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- La Luna Inn Card -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img
                        src="{{ $image2c }}"
                        class="card-img-top"
                        alt="La Luna Inn Facade">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center text-uppercase fw-bold mb-3">LA LUNA INN</h4>

                        <!-- Collapsible Header -->
                        <div class="d-flex justify-content-between align-items-center cursor-pointer mb-3" data-bs-toggle="collapse" data-bs-target="#laLunaDetails" aria-expanded="false" aria-controls="laLunaDetails">
                            <span class=" fw-bold">More Hotel Info</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down " viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>

                        <!-- Collapse Content -->
                        <div class="collapse" id="laLunaDetails">
                            <div class="card-text">
                                <p class="text-sm mb-1 fw-bold text-white">Placeholder Line</p> <!-- Added invisible text to keep spacing similar -->
                                <p class="mb-2  fw-bold">Contact Hotel Director for Pricing</p>
                                <p class="text-muted small">
                                    (Insert hotel details here, e.g., amenities, room types, or booking link information.)
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .cursor-pointer[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }

    .cursor-pointer[aria-expanded="false"] .bi-chevron-down {
        transform: rotate(0deg);
        transition: transform 0.3s ease;
    }

    .img-cover {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>

<section id="sf-attractions" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 text-white py-5" style="background-image: url('{{ $image1 }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; min-height: 500px; background-blend-mode: multiply;">
            <div class="container text-center pt-3 pb-5">
                <h2 class="display-6 fw-bold text-uppercase text-danger underline" style="text-shadow: 1px 1px 3px #000;">
                    LOCAL SAN FRANCISCO ATTRACTIONS
                </h2>
            </div>

            <div class="container pb-5">
                <div class="row row-cols-2 row-cols-md-3 g-3 g-md-4 justify-content-center">

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image3 }}" alt="Alcatraz" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image4 }}" alt="Cable Car" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image5 }}" alt="Coit Tower" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image6 }}" alt="Fisherman's Wharf" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image7 }}" alt="Golden Gate Bridge" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image8 }}" alt="Painted Ladies" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection