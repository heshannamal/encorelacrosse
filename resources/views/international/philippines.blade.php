@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/phillipines/backgroundImage.jpg');
$image1 = asset('images/international/phillipines/image1.jpg');
$image2 = asset('images/international/phillipines/image2.jpg');
$image3 = asset('images/international/phillipines/image3.jpg');
$image4 = asset('images/international/phillipines/image4.jpg');
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
                <h1 class="gf_gs-text-heading-2 mt-3" style="text-transform: uppercase;">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; philippines &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="video-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/IaFE-T6aTuw"
                    title="Video Placeholder 1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/zkTLYqWxbP8"
                    title="Video Placeholder 2"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/mQJ3eZOuJPc"
                    title="Video Placeholder 3"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/T-2kL5e4x4g"
                    title="Video Placeholder 4"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/mVdxUOJk120"
                    title="Video Placeholder 5"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/h5yUahSnbUU"
                    title="Video Placeholder 6"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- <section class="p-0">
    <div class="position-relative">
        <img src="YOUR_BANNER_IMAGE_PATH" class="img-fluid w-100" alt="Banner background">

        <div class="bg-black py-4">
            <div class="container">
                <h1 class="text-white text-center fw-normal fs-2 mb-0">
                    PLAYER JOURNALS
                </h1>
            </div>
        </div>
    </div>
</section> --}}

<section class="py-5">
    <div class="container px-md-5">
        <div class="d-flex overflow-auto mb-5 border-bottom border-secondary" style="white-space: nowrap;">
            @php
            // PHP to generate the dates dynamically (optional, but good for Blade)
            $dates = ['7/26', '7/27', '7/28', '7/29', '7/30', '7/31', '8/1', '8/2', '8/3', '8/4', '8/5'];
            @endphp

            @foreach ($dates as $date)
            <div class="me-3 p-2 text-center {{ $date == '7/26' ? 'fw-bold border-bottom border-3 border-danger' : 'text-secondary' }}" style="cursor: pointer; min-width: 60px;">
                {{ $date }}
            </div>
            @endforeach
        </div>

        <div class="shadow-lg p-4 p-md-5 bg-white border border-light">
            <h2 class="text-center fw-bold text-dark mb-4 mt-3">
                WILL BUCKLEY
            </h2>
            <p class="fs-5 text-dark lh-base">
                The orientation day for our trip to the Philippines was the first day that I had met the majority of the people going with us across the ocean. I had almost no idea what to expect for the trip, but a lot of key components were given to us at the orientation. We learned where we would be staying, how long we would be in each location, and also everything that we needed to bring with us. After the meeting concluded, I was ecstatic to board the plane for the Philippines.
            </p>
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
        </div>
    </div>
</section>

@endsection
