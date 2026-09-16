@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/srilanka/backgroundImage.jpg');
$image1 = asset('images/international/srilanka/image1.jpg');
$image2 = asset('images/international/srilanka/image2.jpg');
$image3 = asset('images/international/srilanka/image3.jpg');
$image4 = asset('images/international/srilanka/image4.jpg');
$image5 = asset('images/international/srilanka/image5.jpg');
$image6 = asset('images/international/srilanka/image6.jpg');
$image7 = asset('images/international/srilanka/image7.jpg');
$image8 = asset('images/international/srilanka/image8.jpg');
$image9 = asset('images/international/srilanka/image9.jpg');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; Sri Lanka &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $image1 }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="mt-3" style="font-weight: 700; text-transform: uppercase;">
                    We have 3 objectives on every cultural immersion trip:
                </h1>
                <p style="font-size: 1.5rem; line-height: 1.5;">
                    Introducing or supporting lacrosse to local organizations
                </p>
                <p style="font-size: 1.5rem; line-height: 1.5;">
                    Intense lacrosse training with our players attending the trip
                </p>
                <p style="font-size: 1.5rem; line-height: 1.5;">
                    Cultural immersion, travel and sightseeing throughout the country
                </p>
            </div>
        </div>
    </div>
</section>

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $image2 }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; SCHEDULE
                            &nbsp;</strong>
                    </span>
                    <p>Arrive in Colombo</p>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="bottom-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image3 }}" class="img-fluid w-100" alt="Colombo Stadium"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0.4);">
                <h2 style="font-weight: 700;">2 DAYS IN COLOMBO</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• Training</li>
                    <li>• Visiting Schools</li>
                    <li>• Historical Civic and Capital City Tour</li>
                    <li>• Beach relaxation</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image4 }}" class="img-fluid w-100" alt="Negombo Beach"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0.4);">
                <h2 style="font-weight: 700;">1 DAY IN NEGOMBO</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• Training</li>
                    <li>• Visiting Schools</li>
                    <li>• Beach relaxation</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image5 }}" class="img-fluid w-100" alt="Mirissa Coast"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0);">
                <h2 style="font-weight: 700;">1 DAY IN MIRISSA</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• Training</li>
                    <li>• Visiting Schools</li>
                    <li>• Hiking</li>
                    <li>• Whale Watching</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image6 }}" class="img-fluid w-100" alt="Sigiriya Rock Fortress"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0.4);">
                <h2 style="font-weight: 700;">2 DAYS IN SIGIRIYA</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• Bullock Cart Tour</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image7 }}" class="img-fluid w-100" alt="Kitulgala White Water Rafting"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0.4);">
                <h2 style="font-weight: 700;">2 DAYS IN KITULGALA</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• White Water Rafting</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4 position-relative">
            <img src="{{ $image8 }}" class="img-fluid w-100" alt="Ella Scenery"
                style="object-fit: cover; width: 100%; height: 100%;">
            <div class="position-absolute w-100 h-100 top-0 start-0 p-4 text-white"
                style="background-color: rgba(0, 0, 0, 0.4);">
                <h2 style="font-weight: 700;">2 DAYS IN ELLA</h2>
                <ul class="list-unstyled" style="font-size: 1.2rem; line-height: 2;">
                    <li>• Training</li>
                    <li>• Visiting Schools</li>
                    <li>• Jungle Adventures</li>
                    <li>• Rock Hiking</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="galle-itinerary" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $image9 }}" class="img-fluid w-100" alt="Galle Paddy Fields" style="object-fit: cover; height: 100vh;">
            
            <div class="position-absolute w-100 text-center text-white px-3" 
                 style="top: 50%; transform: translateY(-50%);">
                
                <h1 style="font-weight: 700; display: inline-block; padding: 0.5rem 1.5rem; background-color: rgba(0, 0, 0, 0.4);">
                    1 DAY IN GALLE
                </h1>
                
                <ul class="list-unstyled mt-3" style="font-size: 1.5rem; line-height: 1.5;">
                    <li>• Safe Bike Ride in the paddy fields</li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection