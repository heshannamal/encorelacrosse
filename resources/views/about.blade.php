@php
    $title = 'About'; // Define the page-specific title here
@endphp

@extends('layouts.app')

<style>
    /*
    1. Base Typography & Resets
    Using 'Inter' font (standard for modern web) for a clean look.
    */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #ffffff;
        color: #000000;
        /* Ensure no horizontal scroll caused by fixed elements */
        overflow-x: hidden;
    }

    /*
    2. Custom Text Colors (Matching the site's red and black theme)
    */
    .text-custom-red {
        color: #ff0000;
        /* A vibrant red used on the original site */
    }

    /*
    3. Hero Section Styles (Full-width backgrounds with overlays)
    */
    .hero-section {
        min-height: 85vh;
        /* Large height for desktop view */
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .hero-overlay-dark {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        /* Dark transparency */
    }

    .hero-content {
        position: relative;
        z-index: 10;
        padding: 2rem;
        max-width: 100%;
    }

    /*
    4. Specific Section Heights and Margins
    */
    .section-padding-large {
        padding: 5rem 0;
    }

    .section-padding-medium {
        padding: 3rem 0;
    }

    /*
    5. Styling for the Pill Buttons (Values Section)
    */
    .value-button {
        display: block;
        width: 100%;
        padding: 1rem 0.5rem;
        margin: 0.5rem 0;
        border: 1px solid #000;
        border-radius: 50px;
        /* Pill shape */
        background-color: transparent;
        color: #000;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        white-space: normal;
        /* Allow text to wrap */
        line-height: 1.2;
    }

    .value-button:hover {
        background-color: #000;
        color: #fff;
    }

    /* Custom sizing for the text above the button grid (OUR VISION) */
    .vision-text-sm {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.6;
    }

    /*
    6. Responsive Adjustments
    Adjusting layout for screens smaller than 768px (tablets/mobile).
    */
    @media (max-width: 767px) {
        .hero-section {
            min-height: 60vh;
            /* Shorter height on mobile */
        }

        .section-padding-large {
            padding: 3rem 0;
        }

        .section-padding-medium {
            padding: 2rem 0;
        }

        .main-title {
            font-size: 2rem !important;
        }

        .main-subtitle {
            font-size: 1rem !important;
        }

        .vision-text-sm {
            font-size: 0.875rem;
        }

        /* Ensure logo images stack nicely on mobile */
        .encore-logos img {
            max-width: 100px;
            height: auto;
        }
    }
</style>

@section('content')

@php
// --- Image Asset Configuration ---
// Update these paths to match the actual location of your assets in the public folder.
$heroBgImage = asset('images/about/image1.jpg'); // Section 1: EST. NOW background
$iconSmall = asset('images/about/logo2.png'); // Section 2: Small icon above ENCORE text

// Section 1: Logos (filter: invert(1) applied in CSS for white look)
$heroLogo1 = asset('images/about/logo1.png');
// $heroLogo2 = asset('images/about/image1.jpg');
// $heroLogo3 = asset('images/about/image1.jpg');

$visionBg = asset('images/about/image2.jpg'); // Section 3: OUR VISION background
$missionBg = asset('images/about/image3.jpg'); // Section 4: OUR MISSION background
$finalBgMedia = asset('images/about/image4.jpg'); // Section 6: Final background media (could be video placeholder)
$finalBgMediaVideo = asset('images/about/008d6d008f3f4d15917aadf2607c491b.mp4'); // Section 6: Final background media (could be video placeholder)
@endphp

<!-- 1. HERO SECTION: EST. NOW -->
<section
    class="hero-section d-flex align-items-end justify-content-center min-vh-100"
    style="background-image: url('{{ $heroBgImage }}'); background-size: cover; background-position: center center; position: relative; overflow: hidden;">

    <div class="hero-overlay-dark position-absolute top-0 start-0 w-100 h-100"
        style="background-color: rgba(0, 0, 0, 0.4);">
    </div>

    <div class="hero-content w-100 text-center pb-4"
        style="position: relative; z-index: 10;">

        <h1 class="text-white fw-bolder text-uppercase mb-3"
            style="font-size: clamp(2.5rem, 8vw, 6rem); letter-spacing: 0.5rem; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            E S T . N O W
        </h1>

        <div class="encore-logos d-flex justify-content-center align-items-center mt-3">
            <img src="{{ $heroLogo1 }}" alt="Encore Brand Logos" class="hero-logo-strip img-fluid"
                style="max-width: 80%; opacity: 0.85;">
        </div>
    </div>
</section>

<!-- 2. CORE TEXT CONTENT & VISION SECTION -->
<section class="section-padding-medium">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center px-4">
                <!-- ENCORE is a lifestyle company... -->
                <div class="mb-5 pb-3">
                    <img src="{{ $iconSmall }}" alt="Icon" class="mb-3" style="max-width: 100px;">
                    <!-- <h2 class="h4 font-weight-bold mb-3" style="letter-spacing: 0.2rem;">ENCORE</h2> -->
                    <p class="h5 mb-0" style="font-weight: 300;">
                        is a lacrosse lifestyle company based in San Francisco, California.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. VISION SECTION: Image Background (The player's hand/leg image) -->
<section
    class="hero-section"
    style="background-image: url('{{ $visionBg }}'); min-height: 100vh;">
    <div class="hero-overlay-dark" style="max-height: 280px;">
        <div class="hero-content" style="max-height: 100px;">
            <h3 class="h4 mb-3 text-white font-weight-bold" style="letter-spacing: 0.2rem;">OUR VISION</h3>
            <p class="vision-text-sm text-white px-md-5 mx-md-5" style="border-top: 1px solid #e0e0e0;">
                is to share lacrosse with the world, and with the universal platform of sports, create multi-cultural experiences and instill globally conscious values that transcend beyond the playing field.
            </p>
        </div>
    </div>
</section>

<!-- 4. Mission SECTION: Image Background (The player's hand/leg image) -->
<section
    class="hero-section"
    style="background-image: url('{{ $missionBg }}'); min-height: 100vh;">
    <div class="hero-overlay-dark" style="max-height: 280px;">
        <div class="hero-content" style="max-height: 100px;">
            <h3 class="h4 mb-3 text-white font-weight-bold" style="letter-spacing: 0.2rem;">OUR MISSION</h3>
            <p class="vision-text-sm text-white px-md-5 mx-md-5" style="border-top: 1px solid #e0e0e0;">
                is to inspire action through lacrosse culture.
            </p>
        </div>
    </div>
</section>

<!-- 5. CORE TEXT CONTENT (Middle Text Block) -->
<section class="section-padding-medium">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 text-center px-4" style="font-weight: 300; font-size: 1.1rem; line-height: 1.8;">
                <p class="mb-2">
                    WE PROMOTE LACROSSE CULTURE THROUGH WORLD CLASS DESTINATION EVENTS AND PROJECT BASED INTERNATIONAL, URBAN, AND NON-PROFIT LACROSSE DEVELOPMENT.
                    WE DESIGN, DEVELOP, AND MANUFACTURE HIGH QUALITY LACROSSE UNIFORMS, TEAM WEAR AND LIFESTYLE PRODUCTS.
                    WE BELIEVE SPORTS TEACHES AND DEVELOPS MANY LIFELONG VALUES—SOME OF THE MOST IMPACTFUL TO OUR CULTURE ARE:
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 6. FINAL BACKGROUND SECTION (Video/Image Placeholder) -->
<section class="hero-section position-relative overflow-hidden min-vh-100">
    <video
        autoplay loop muted playsinline id="bg-video" class="position-absolute z-n1"
        style="top: 50%;left: 50%;min-width: 100%;min-height: 100%;width: auto;height: auto;transform: translate(-50%, -50%);">
        <source src="{{ $finalBgMediaVideo }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay-dark position-absolute top-0 start-0 w-100 h-100 z-0"
        style="background-color: rgba(0, 0, 0, 0.1);">
    </div>
    <div class="hero-content position-relative z-1">
    </div>
</section>

<!-- 7. VALUES / PILLARS SECTION (Grid of 12 Buttons) -->
<section class="section-padding-medium pt-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-2 g-md-4">
            {{-- Row 1 --}}
            <div class="col"><button class="value-button">COMPETE</button></div>
            <div class="col"><button class="value-button">TRAVEL</button></div>
            <div class="col"><button class="value-button">PLAY MULTIPLE SPORTS</button></div>
            {{-- Row 2 --}}
            <div class="col"><button class="value-button">CREATE ART AND MUSIC</button></div>
            <div class="col"><button class="value-button">BE HUMBLE IN VICTORY AND DEFEAT</button></div>
            <div class="col"><button class="value-button">HAVE FUN</button></div>
            {{-- Row 3 --}}
            <div class="col"><button class="value-button">BE ENERGETIC</button></div>
            <div class="col"><button class="value-button">QUESTION STANDARDS</button></div>
            <div class="col"><button class="value-button">NOURISH THE BODY</button></div>
            {{-- Row 4 --}}
            <div class="col"><button class="value-button">READ, TEACH, LEARN</button></div>
            <div class="col"><button class="value-button">TAKE CARE OF OUR EARTH</button></div>
            <div class="col"><button class="value-button">DO SOMETHING EVERYDAY THAT MAKES YOU UNCOMFORTABLE</button></div>
        </div>
    </div>
</section>

<!-- 8. FINAL BACKGROUND SECTION (Video/Image Placeholder) -->
<section
    class="hero-section"
    style="background-image: url('{{ $finalBgMedia }}'); min-height: 100vh;">
    <!-- Overlay is optional here, based on the final screenshot. Keeping it light/invisible. -->
    <div class="hero-overlay-dark" style="background-color: rgba(0, 0, 0, 0.1);"></div>
    <div class="hero-content">
    </div>
</section>

@endsection