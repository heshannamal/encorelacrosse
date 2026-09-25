@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/ecuador/backgroundImage.JPG');
$image1 = asset('images/international/ecuador/image1.jpg');
$image2 = asset('images/international/ecuador/image2.jpg');
$image3 = asset('images/international/ecuador/image3.jpg');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3" style="text-transform: uppercase;">
                    <span>
                        <strong>&nbsp; &nbsp; ecuador &nbsp;</strong>
                    </span>
                </h1>
                <p>QUITO MOUNTAINS AND GALAPAGOS ISLANDS- ADVENTURE TRAVEL </br>
                    2015/2017</p>
            </div>
        </div>
    </div>
</section>

<section id="video-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-4">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/Os0mIbj8UmY"
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
                    src="https://youtube.com/embed/K_3_aBx6byo"
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
                    src="https://youtube.com/embed/4p3siDONEFs"
                    title="Video Placeholder 3"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section id="bottom-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image1 }}" class="img-fluid w-100" alt="Colombo Stadium"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <div class="col-12 col-md-6 position-relative">
            <img src="{{ $image2 }}" class="img-fluid w-100" alt="Negombo Beach"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
</section>

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $image3 }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
        </div>
    </div>
</section>

@endsection