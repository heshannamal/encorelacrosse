@extends('layouts.app')

@section('content')

@php
$hero_bg = asset('images/custom/embellishment/backgroundImage.JPG');
$deztek_img = asset('images/custom/embellishment/image1.avif');
$lattek_img = asset('images/custom/embellishment/image2.avif');
$hydrotek_img = asset('images/custom/embellishment/image3.webp');
$venttek_img = asset('images/custom/embellishment/image4.webp');
$versatek_img = asset('images/custom/embellishment/image5.avif');
$fleece_img = asset('images/custom/embellishment/image6.avif');
$frenchterry_img = asset('images/custom/embellishment/image7.avif');
@endphp

<style>
    .hover-effect {
        overflow: hidden;
        transition: transform .5s ease;
    }

    .hover-effect:hover {
        transform: scale(1.1);
    }
</style>

<section class="position-relative w-100 d-flex align-items-center justify-content-center" style="height: 80vh; min-height: 400px; background-image: url('{{ $hero_bg }}'); background-size: cover; background-position: center;">
    {{-- Dark Overlay --}}
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-25"></div>

    {{-- Hero Content --}}
    <div class="position-relative z-1 text-center">
        <h1 class="text-white fw-bold display-3" style="letter-spacing: 2px; background-color: rgba(0,0,0,0.3); padding: 10px 20px;">
            &nbsp; &nbsp; &nbsp;EMBELLISHMENT&nbsp; &nbsp;&nbsp;
        </h1>
    </div>
</section>

<!-- {{-- 1. DEZTEK Section (Image Left, Text Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $deztek_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">SCREEN PRINTING</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Screen printing is the OG of embellishment and always makes its way back into style. Mesh screens separate design colors and imagery to create a high quality printed graphic.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 2. LATTEK Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">SUBLIMATION</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Sublimation is the most common form of uniform printing. Ink based printouts are dyed directly into the fabric to create unlimited seam to seam, full color design options.</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $lattek_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

<!-- {{-- 3. HYDROTEK Section (Image Left, Text Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $hydrotek_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">HEAT SEAL</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Heat seals are graphics created special solvent inks and transfer papers, with heat and pressure used to apply the design. These are excellent for applying small, detailed graphics in hard to print areas.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 4. VENTTEK Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">EMBROIDERY</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Embroidery is a stitching embellishment using a thread and needle. Designs can be made detailed and intricately using high stitch-count machinery and high resolution artwork from our design teams.</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $venttek_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

<!-- {{-- 5. VERSATEK Section (Image Left, Text Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $versatek_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">TACKLE TWILL APLIQUE</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Tackle twill or aplique is an embellishment technique using cut out fabric designs as logos or lettering, and stitching them to the garment. This creates a heavier weight garment with a very formal look.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 6. FLEECE Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">BONDING</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Bonding is used for both embellishment and production. Highly durable bonding seals can create an application for seam attachment, as well be cut and used for logos and lettering.</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $fleece_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

<!-- {{-- 7. FRENCH TERRY --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $frenchterry_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">LASER HOLES</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <span>Lasers are used to create functional and decorative holes in fabrics. Laser holes can help increase the ventilation and breathability of the garment.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection