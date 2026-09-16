@extends('layouts.app')

@section('content')

@php
// images paths
$backgroundImage = asset('images/custom/teamCustom/backgroundImage.webp');
$image1 = asset('images/custom/teamCustom/image1.webp');
$image2 = asset('images/custom/teamCustom/image2.webp');
$image3 = asset('images/custom/teamCustom/image3.avif');
$image4 = asset('images/custom/teamCustom/image4.avif');
@endphp

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Image and Content Column -->
        <div class="col-12 position-relative">
            <img src="{{ asset('images/custom/teamCustom/backgroundImage.webp') }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; TEAM STORE & DOOR TO DOOR DELIVERY &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="collegiate-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">>
    <div class="row align-items-center g-5">

        <!-- Left Column (Image + Thumbnails) -->
        <div class="col-12 col-md-6 text-center">
            <!-- Main Image -->
            <img id="main-image"
                src="{{ $image1 }}"
                alt="Collegiate Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>

        <!-- Right Column (Text Content) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-3 mb-4"
                style="border: 2px solid #d3d3d3; display: inline-block;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">
                    SELECT ITEMS FOR YOUR TEAM
                </h2>
            </div>
            <hr>
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                Uniform Kits can include mandatory items and bundled items.
            </p>
        </div>
    </div>
</section>

<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">Pro 2.0 Game Jersey</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pro 2.0 Game Jersey is an updated look on the Pro Jersey (which has become an instant classic). The sleeve cuff remains to keep the same look as the original, but full game sleeves finish off the look. Updated side paneling give a fresh look and the mesh inserts to allow air to pass through the garment to alleviate heat and moisture. This jersey can also be made reversible for both home and away.
            </p>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ $image2 }}"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>
    </div>
</section>

<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ $image3 }}"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">Pro Game Jersey</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pro Jersey has been popularized by some of the nation’s top collegiate programs. Featuring abbreviated sleeves,
                the Pro Jersey is designed to allow greater range of motion and comfort. The back panel is mesh to allow air to pass
                through the garment to alleviate heat and moisture. This jersey can also be made reversible for both home and away.
            </p>
        </div>
    </div>
</section>

<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">FRONTIER GAME JERSEY</h2>
            </div>
            <h5>DESIGNER'S NOTES</h5>
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Frontier Jersey is our most technical and traditional game jersey. The back panel is VentTek from the top shoulder to the bottom of the garment, designed to keep the athlete cool on the field. Contrast piping and paneling along the collar also add unique color pops, while maintaining legality for NCAA and NFHS regulations.
            </p>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ $image4 }}"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>
    </div>
</section>

@endsection