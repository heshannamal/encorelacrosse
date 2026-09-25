@extends('layouts.app')

@php
// Define Asset Paths
$video_banner = asset('images/custom/customGraphicDesign/Design_Banner_20px_bleed_x2.mp4');

// Content Images
$img_placement_design = asset('images/custom/customGraphicDesign/encorelacrosse2.svg');
$img_color_pattern = asset('images/custom/customGraphicDesign/encorelacrosse3.svg');
$img_custom_design = asset('images/custom/customGraphicDesign/encoreLacrosse4.svg');
$img_color_match = asset('images/custom/customGraphicDesign/encoreLacrosse5.svg');
$img_replication = asset('images/custom/customGraphicDesign/encoreLacrosse6.svg');
$img_total_brand = asset('images/custom/customGraphicDesign/encoreLacrosse7.svg');

// Bottom Grid Images (CDN links from original replaced with asset syntax for consistency)
$img_grid_design = asset('images/Design_copy.jpg');
$img_grid_shop = asset('images/Shop_copy.jpg');
$img_grid_team = asset('images/TeamStore_copy.jpg');
$img_grid_embellish= asset('images/Embellishment2.jpg');
$img_grid_sizing = asset('images/Sizing_copy.jpg');
$img_grid_fabric = asset('images/Fabric_copy.jpg');
@endphp

@section('content')

{{-- Page Specific Styles to ensure Exact UI match --}}
<style>
    /* Font Imports matching original */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@300;400;500;700&display=swap');

    .custom-design-page {
        font-family: 'Open Sans', sans-serif;
        color: #333;
        overflow-x: hidden;
    }

    .custom-design-page h1,
    .custom-design-page h2,
    .custom-design-page .btn {
        font-family: 'Oswald', sans-serif;
        text-transform: uppercase;
    }

    /* Video Hero */
    .video-section {
        position: relative;
        height: 676px;
        width: 100%;
        overflow: hidden;
        background-color: #000;
    }

    .video-section video {
        object-fit: cover;
        width: 100%;
        height: 100%;
        opacity: 0.9;
    }

    .video-overlay-text {
        position: absolute;
        bottom: 80px;
        right: 40px;
        text-align: right;
        color: white;
        z-index: 2;
        line-height: 1;
    }

    .video-overlay-text h1 {
        font-size: 40px;
        font-weight: 700;
        margin: 0;
    }

    .video-overlay-text h2 {
        font-size: 20px;
        font-weight: 400;
        margin: 0;
    }

    /* Navigation Buttons */
    .concept-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 100%;
        min-height: 80px;
        border: 1px solid #e5e5e5;
        background: white;
        color: #333;
        font-weight: 500;
        border-radius: 0;
        transition: all 0.3s ease;
        line-height: 1.2;
    }

    .concept-btn:hover {
        background-color: #f8f9fa;
        color: #c40000;
        border-color: #c40000;
    }

    /* Content Areas */
    .content-heading {
        font-style: italic;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .content-text {
        font-style: italic;
        font-size: 1rem;
    }

    .form-control,
    .btn-submit {
        border-radius: 0;
    }

    .btn-submit {
        background-color: #ff0000ff;
        color: white;
        border: none;
        font-weight: 700;
        padding: 10px 30px;
    }

    .btn-submit:hover {
        background-color: #c40000;
        color: white;
    }

    /* Bottom Grid */
    .grid-tile {
        position: relative;
        overflow: hidden;
    }

    .grid-tile img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .grid-tile:hover img {
        transform: scale(1.05);
    }

    .grid-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        width: 100%;
        pointer-events: none;
    }

    .grid-overlay h2 {
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        font-size: 1.5rem;
    }

    @media (max-width: 768px) {
        .video-section {
            height: 250px;
        }

        .video-overlay-text {
            right: 0;
            left: 0;
            bottom: 20px;
            text-align: center;
        }

        .video-overlay-text h1 {
            font-size: 24px;
        }

        .video-overlay-text h2 {
            font-size: 14px;
        }
    }
</style>

<div class="custom-design-page">

    <section class="video-section">
        <video autoplay muted loop playsinline>
            <source src="{{ $video_banner }}" type="video/mp4">
        </video>
        <div class="video-overlay-text">
            <h1>CUSTOM GRAPHIC DESIGN</h1>
            <h2>ENCORE BRAND LACROSSE</h2>
        </div>
    </section>

    <section class="container my-4">
        <div class="row g-2 row-cols-2 row-cols-md-5">
            <div class="col">
                <a href="#" class="btn concept-btn">MEN’S UNIFORM<br>DESIGN CONCEPTS</a>
            </div>
            <div class="col">
                <a href="#" class="btn concept-btn">WOMEN’S UNIFORM<br>DESIGN CONCEPTS</a>
            </div>
            <div class="col">
                <a href="#" class="btn concept-btn">PATTERN DESIGN<br>CONCEPTS</a>
            </div>
            <div class="col">
                <a href="#" class="btn concept-btn">SUBLIMATION<br>DESIGN CONCEPTS</a>
            </div>
            <div class="col d-col-12 d-md-col"> {{-- Full width on super small, part of grid on others --}}
                <a href="#" class="btn concept-btn">NUMBER STYLES<br>AND FONTS</a>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-6 text-center">
                <img src="{{ $img_custom_design }}" alt="Custom Uniform Design" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="content-heading"><i><strong>CUSTOM UNIFORM DESIGN</strong></i></h1>
                <p class="content-text">
                    We provide custom designs and visual mock ups based on customer needs and vision, as part of our standard uniform ordering process. Utilize our design concept gallery, or send over other inspiration for our designers to create your custom look.
                </p>
                <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="source" value="Custom Graphic Design - Custom Uniform Design">
                    <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Name:</div>
                        <div class="col-9"><input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Email:</div>
                        <div class="col-9"><input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Phone:</div>
                        <div class="col-9"><input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 fw-bold fst-italic">Message:</div>
                        <div class="col-9"><textarea name="message" class="form-control" rows="3" placeholder="Enter your text...">{{ old('message') }}</textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <button type="submit" class="btn btn-submit text-uppercase">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="content-heading"><i><strong>COLOR MATCHING</strong></i></h1>
                <p class="content-text">
                    Color matching is more art than science. Different fabrics, embellishment styles, embellishment equipment, and lighting sources can cause similar colors to look very different. Our design team has the ability to support your club by assigning the proper color code, and can create custom swatches and prints for approval prior to final production.
                </p>
                <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="source" value="Custom Graphic Design - Color Matching">
                    <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Name:</div>
                        <div class="col-9"><input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Email:</div>
                        <div class="col-9"><input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Phone:</div>
                        <div class="col-9"><input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 fw-bold fst-italic">Message:</div>
                        <div class="col-9"><textarea name="message" class="form-control" rows="3" placeholder="Enter your text...">{{ old('message') }}</textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <button type="submit" class="btn btn-submit text-uppercase">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <img src="{{ $img_color_match }}" alt="Color Matching" class="img-fluid w-100">
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-6 text-center">
                <img src="{{ $img_replication }}" alt="Image Replication" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="content-heading"><i><strong>IMAGE REPLICATION</strong></i></h1>
                <p class="content-text">
                    If your club has a low resolution logo that is not suitable for printing, or perhaps an old favorite apparel design that you would like to replicate- our design team can redraft your image in a high resolution, vector file so it can be used for all design, marketing and apparel needs.
                </p>
                <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="source" value="Custom Graphic Design - Image Replication">
                    <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Name:</div>
                        <div class="col-9"><input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Email:</div>
                        <div class="col-9"><input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Phone:</div>
                        <div class="col-9"><input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 fw-bold fst-italic">Message:</div>
                        <div class="col-9"><textarea name="message" class="form-control" rows="3" placeholder="Enter your text...">{{ old('message') }}</textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <button type="submit" class="btn btn-submit text-uppercase">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-6 order-2 order-md-1">
                <h1 class="content-heading"><i><strong>TOTAL BRANDING</strong></i></h1>
                <p class="content-text">
                    Your Team, Company or Organization Logo | Web Site | Social Media content design can be fully developed by the ENCORE Design Studio
                </p>
                <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="source" value="Custom Graphic Design - Total Branding">
                    <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Name:</div>
                        <div class="col-9"><input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Email:</div>
                        <div class="col-9"><input type="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required></div>
                    </div>
                    <div class="row mb-2 align-items-center">
                        <div class="col-3 fw-bold fst-italic">Phone:</div>
                        <div class="col-9"><input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3 fw-bold fst-italic">Message:</div>
                        <div class="col-9"><textarea name="message" class="form-control" rows="3" placeholder="Enter your text...">{{ old('message') }}</textarea></div>
                    </div>
                    <div class="row">
                        <div class="col-9 offset-3">
                            <button type="submit" class="btn btn-submit text-uppercase">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <img src="{{ $img_total_brand }}" alt="Total Branding" class="img-fluid w-100">
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row align-items-center g-5">
            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <img src="{{ $img_placement_design }}" alt="placement design" class="img-fluid w-140">
            </div>
            <div class="col-12 col-md-6 order-1 order-md-2 text-center">
                <img src="{{ $img_color_pattern }}" alt="color pattern" class="img-fluid w-140">
            </div>
        </div>
    </section>

    {{-- <section class="container-fluid p-0 mb-5">
        <div class="row g-1">
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_design }}" alt="Custom Artwork">
                    <div class="grid-overlay">
                        <h2>CUSTOM ARTWORK &<br>GRAPHIC DESIGN</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_shop }}" alt="Shop Lifestyle">
                    <div class="grid-overlay">
                        <h2>SHOP LIFESTYLE<br>APPAREL</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_team }}" alt="Team Store">
                    <div class="grid-overlay">
                        <h2>TEAM STORE &<br>DOOR TO DOOR DELIVERY</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_embellish }}" alt="Embellishment">
                    <div class="grid-overlay">
                        <h2>EMBELLISHMENT<br>TYPES</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_sizing }}" alt="Sizing">
                    <div class="grid-overlay">
                        <h2>SIZING<br>GUIDELINES</h2>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 grid-tile">
                <a href="#">
                    <img src="{{ $img_grid_fabric }}" alt="Fabric">
                    <div class="grid-overlay">
                        <h2>FABRIC<br>TYPES</h2>
                    </div>
                </a>
            </div>
        </div>
    </section> --}}

</div>
@endsection
