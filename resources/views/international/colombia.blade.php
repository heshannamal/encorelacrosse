@extends('layouts.app')

@section('content')

@php
$heroBgImage = asset('images/international/colombia/backgroundImage.jpg');
$image1 = asset('images/international/colombia/image1.jpg');
$image2 = asset('images/international/colombia/image2.jpg');
$image3 = asset('images/international/colombia/image3.jpg');
$image4 = asset('images/international/colombia/image4.jpg');
$image5 = asset('images/international/colombia/image5.jpg');
$image6 = asset('images/international/colombia/image6.jpg');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ $heroBgImage }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3" style="text-transform: uppercase;">
                    <span>
                        <strong>&nbsp; &nbsp; colombia &nbsp;</strong>
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
                    src="https://youtube.com/embed/6xAPrfwaKjw"
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
                src="https://youtube.com/embed/jY_B3H5MG6w"
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
                src="https://youtube.com/embed/zKKrREC2caI"
                title="Video Placeholder 1"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            </iframe>
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
                        ¡VIVA COLOMBIA! </h1>

                    <p class="fs-5 fw-light mx-auto px-4" style="letter-spacing: 0.2rem; background-color: rgba(0, 0, 0, 0.4);">
                        In the summer of 2012 we hit the road from San Francisco to Los Angeles in search of the best denim fabric the west coast has to offer. Gisela Castaneda, designer and founder of GC Urbano, was along for the ride. After learning about her involvement with Kiwanis International, the ¡Viva Colombia! project was born. We donated 60 lacrosse sticks, a full bag of balls, and a couple goals to help start Colombia’s first lacrosse program! In addition, Encore Brand donated 50 bicycles to the children of the community. Providing these bicycles will not only give a means of transportation, but also the ability for these children to get to school and receive an education. To learn more about the project and the organizations involved, check out the video below:
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

@endsection
