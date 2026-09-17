@extends('layouts.app')

@section('content')

@php
$hero_bg = asset('https://ucarecdn.com/21466f01-aea9-4b38-8c5c-99bdd6881012/-/format/auto/-/preview/3000x3000/-/quality/lighter/Fabric%20Page-02.jpg');
$deztek_img = asset('https://ucarecdn.com/12fecdda-ce35-4a2e-889c-da418db29a77/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$lattek_img = asset('https://ucarecdn.com/7c8ea9b4-c04a-4062-8666-1a11759f8fb4/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$hydrotek_img = asset('https://ucarecdn.com/7a8e0d59-d0a7-4e4b-99f1-9ad85443a1b2/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$venttek_img = asset('https://ucarecdn.com/74164885-9033-4e27-9d9b-d04362ec04e0/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$versatek_img = asset('https://ucarecdn.com/82265ad9-5fb2-4c74-b8f4-423f34f34ff0/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$fleece_img = asset('https://ucarecdn.com/bd8c8a8b-0cdf-4213-a460-23e01bcd93f8/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$frenchterry_img = asset('https://ucarecdn.com/b1d542ca-3b0e-4b6c-81a0-6517242a83d1/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$temptek_img = asset('https://ucarecdn.com/fc295ed7-3ad2-4a7a-9131-4f32e3850d3b/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$riptek_img = asset('https://ucarecdn.com/4ad00b49-975f-40f9-a4b0-82d625341b65/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$foamtek_img = asset('https://ucarecdn.com/8e239484-81fb-4c87-a3b7-27c2a0624251/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$airtek_img = asset('https://ucarecdn.com/6da5a943-2f6d-474b-bad4-52dd0e664ce6/-/format/auto/-/preview/3000x3000/-/quality/lighter/');
$bamboo_img = asset('https://ucarecdn.com/6d6647a1-0065-45ac-9c89-743724de1aa4/-/format/auto/-/preview/3000x3000/-/quality/lighter/oeko-tex-bamboo-terry-cloth-black.jpg');
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
            &nbsp; &nbsp; &nbsp;FABRIC&nbsp; &nbsp;&nbsp;
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">DEZTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>90% polyester/ 10% Spandex 120 GSM Single Jersey</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named DezTek because it (and you) stays cool when it's hot</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lightweight breathable fabric w/ four way stretch</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Amazing for shooter shirts, shorts and 2 ply reversibles</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for sublimation and screen print embellishment</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Available in heavier weight version</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">LATTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>90% polyester/ 10% Spandex 120 GSM</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named LatTek because it stretches laterally</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lightweight breathable fabric w/ 2 way stretch</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Durable Fabric used for reversibles and shorts</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for sublimation and screen print embellishment</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>More economical option than DezTek or HydroTek</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">HYDROTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>95% polyester/ 5% Elastain 120 GSM Woven</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named HydroTek for its bathing suit like feel</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Woven fabric with moisture wicking properties</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Durable fabric with a heavier weight than LatTek & DezTek</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for sublimation and embroidery embellishment</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Premium fabric used for game jerseys, reversibles & shorts</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">VENTTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>100% polyester</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named VentTek for its mesh feel and ventilation properties</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lightweight fabric w/ minimal stretch</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Ideal fabric for paneling</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for screen print and some sublimation designs</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Economical option for reversibles</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">VERSATEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>83% polyester/ 17% Spandex 160 GSM Single Jersey</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named VersaTek for its versatile functionality</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lightweight nylon fabric w/ four way stretch</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Soft, comfortable feel with athletic performance</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for screen print and embroidery- no sublimation</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Great for all lifestyle items- tees, BSE, shorts, joggers</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">FLEECE</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Traditional Heavyweight Cotton Fleece</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Balanced with poly and viscose for plush feel and breathability</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Brushed yarn loops create a soft, fuzzy feel</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for screen print, embroidery & tackle twill</span>
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
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">FRENCH TERRY</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Traditional French Terry Fabric</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lighter weight, moisture wicking & durable fabric</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Closed loops create a less bulky alternative to fleece</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Ideal fabric for year round outerwear or layering</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for screen print, embroidery & tackle twill</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 8. TEMPTEK Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">TEMPTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named TempTek because it keeps you warm and dry</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Medium to heavy weight soft-shell fabric</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Original and best selling Samurai Jacket fabric</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for embroidery and tackle twill embellishment</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Water resistant, windproof & breathable</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $temptek_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

<!-- {{-- 9. RIPTEK Section (Image Left, Text Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $riptek_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">RIPTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named RipTek because of its Ripstop reinforced weave</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Crosshatch ripstop weave is resistant to ripping and tearing</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Superior strength to weight ratio is both durable and breathable</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Lightweight jacket fabric is ideal for spring, summer, fall</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for embroidery and tackle twill embellishment</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 10. FOAMTEK Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">FOAMTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named FoamTek because of its spongelike feel</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Heavyweight jacket and hoodie "spacer" fabric</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>3 Dimensional style fabric is thick and cushy</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Offers a unique look and smooth comfortable feel</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for embroidery and tackle twill embellishment</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $foamtek_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

<!-- {{-- 11. AIRTEK Section (Image Left, Text Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-1 hover-effect" style="height: 500px; background-image: url('{{ $airtek_img }}'); background-size: cover; background-position: center;"></div>

        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-2">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">AIRTEK</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Named AirTek because of its airy ventilation</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Also called Porthole Mesh</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Traditional mesh jersey fabric with a retro football look</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Great jersey trim fabric for gusset panels</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Best suited for sublimation</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- {{-- 12. BAMBOO Section (Text Left, Image Right) --}} -->
<section class="container-fluid g-0 overflow-hidden">
    <div class="row g-0 align-items-center">
        {{-- Text Column --}}
        <div class="col-12 col-md-6 p-4 p-lg-5 order-2 order-md-1">
            <div class="px-lg-5 mx-lg-4">
                {{-- Pill Header --}}
                <div class="text-center mb-4">
                    <div class="border border-dark rounded-pill py-2 px-4 d-block mx-auto" style="max-width: 550px; border-width: 1px !important;">
                        <h2 class="m-0 fw-bold fst-italic text-uppercase" style="letter-spacing: 1px;">BAMBOO</h2>
                    </div>
                </div>

                <ul class="list-unstyled">
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Sustainable & renewable fabric.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Soft & moisture-wicking.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Breathable & temperature-regulating.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Antibacterial & hypoallergenic.</span>
                    </li>
                    <li class="d-flex align-items-start mb-2">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>Eco-friendly luxury.</span>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Image Column --}}
        <div class="col-12 col-md-6 order-1 order-md-2 hover-effect" style="height: 500px; background-image: url('{{ $bamboo_img }}'); background-size: cover; background-position: center;"></div>
    </div>
</section>

@endsection