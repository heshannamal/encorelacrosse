@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/uganda/backgroundImage.jpg');
$image1 = asset('images/international/uganda/image1.jpg');
$image2 = asset('images/international/uganda/image2.jpg');
$image3 = asset('images/international/uganda/image3.jpg');
$image4 = asset('images/international/uganda/image4.jpg');
$image5 = asset('images/international/uganda/image5.jpg');
$image6 = asset('images/international/uganda/image6.jpg');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3" style="text-transform: uppercase;">
                    <span>
                        <strong>&nbsp; &nbsp; uganda &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="video-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-12">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/1UsgVCDd8WU"
                    title="Video Placeholder 1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section id="fields-of-growth-collaboration" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">

            <img
                src="{{ $image1 }}"
                class="img-fluid w-100"
                alt="Fields of Growth Collaboration"
                style="object-fit: cover; height: 500px;">

            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white p-4">

                <div class="col-lg-8 col-md-10 text-center">
                    <h1 class="fs-2 fw-normal mb-4 px-3">
                        F I E L D S &nbsp; O F &nbsp; G R O W T H &nbsp; C O L L A B O R A T I O N
                    </h1>

                    <p class="fs-5 fw-light mx-auto px-4" style="letter-spacing: 0.2rem; background-color: rgba(0, 0, 0, 0.4);">
                        Encore Brand worked with Fields of Growth to raise awareness and funds for their efforts in Uganda. Founded in 2009 by former college lacrosse coach and player, Kevin Dugan, Fields of Growth (FOG) aims to harness the passion of the lacrosse community into positive social impact through global leadership development, service and growth of the game. Encore Brand designed and produced 150 Uganda AIC Lacrosse Campaign shirts inspired by a structure found in a remote village which indicates that you are standing directly on the equator. $5 from every shirt sold went directly back to the Fields of Growth Organization. This project would not have been possible without Mark Blake and the Ross Valley Youth Lacrosse Club . Check out the t-shirt inspiration photos below:
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section id="bottom-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image2 }}" class="img-fluid w-100" alt="Colombo Stadium"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image3 }}" class="img-fluid w-100" alt="Negombo Beach"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
</section>

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $image4 }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
        </div>
    </div>
</section>

<section id="bottom-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image5 }}" class="img-fluid w-100" alt="Colombo Stadium"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image6 }}" class="img-fluid w-100" alt="Negombo Beach"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
</section>

@endsection