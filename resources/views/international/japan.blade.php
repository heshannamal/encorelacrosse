@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/japan/backgroundImage.JPG');
$image1 = asset('images/international/japan/image1.JPG');
$image2 = asset('images/international/japan/image2.jpg');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3" style="text-transform: uppercase;">
                    <span>
                        <strong>&nbsp; &nbsp; japan &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="video-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/qvg28nqZlO4"
                    title="Video Placeholder 1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                </iframe>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="embed-responsive embed-responsive-16by9" style="position: relative; width: 100%; padding-bottom: 56.25%;">
                <iframe class="embed-responsive-item"
                    src="https://youtube.com/embed/FJ5pacUoBhA"
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

            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-white p-4" style="letter-spacing: 0.2rem; background-color: rgba(0, 0, 0, 0.4);">

                <div class="col-lg-8 col-md-10 text-center">
                    <h1 class="fs-2 fw-normal mb-4 px-3">
                        CULTURAL IMMERSION & SAMURAI CUP
                    </h1>

                    <p class="fs-5 fw-light mx-auto px-4">
                        Encore Brand Lacrosse and The Crease Monkeys travels to Tokyo, Japan for an epic dive into the Japan lacrosse scene. The trip was full of great site seeing, an historical winter storm, a game changing clinic at the national institute of science and a battle between the Japan National team and the Crease Monkeys. Encore Brand Lacrosse will continue to make annual trips back to Japan working with the Japan Lacrosse Association and Samurai Lacrosse to continue the expansion of lacrosse not only at the college level but to see it start at the high school and youth level. </p>
                </div>
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
