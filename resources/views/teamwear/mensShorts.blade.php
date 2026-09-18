@extends('layouts.app')

@section('content')

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Image and Content Column -->
        <div class="col-12 position-relative">
            <img src="{{ asset('images/teamwear/mensShorts/backgroundImage.webp') }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h2 class="display-3 fw-bold" style="Font-Family: 'Bebas Neue', sans-serif;">ENCORE CUSTOM TEAM APPAREL</h2>
                <p class="lead fs-4">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
                <!-- <p class="btn btn-dark btn-lg mt-3 rounded-0" style="border-radius: 0 !important;">MEN'S GAME JERSEYS</a>
                </p> -->
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; &nbsp; &nbsp; Men's Shorts&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- PACIFIC SHORTS -->
<section id="collegiate-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">>
    <div class="row align-items-center g-5">

        <!-- Left Column (Image + Thumbnails) -->
        <div class="col-12 col-md-6 text-center">
            <!-- Main Image -->
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShorts/PASIFICSHORT/PASIFICSHORTFRONT_2048x2048.webp') }}"
                alt="Collegiate Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShorts/PASIFICSHORT/PASIFICSHORTBACK_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PASIFICSHORT/PASIFICSHORTFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PASIFICSHORT/PASIFICSHORTLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PASIFICSHORT/PASIFICSHORTRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
            </div>
        </div>

        <!-- Right Column (Text Content) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-3 mb-4"
                style="border: 2px solid #d3d3d3; display: inline-block;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">
                    PACIFIC SHORT
                </h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pacific Short is an athletic short designed with a more tailored fit, and can be worn comfortably on and off the field. The flat waistband is technically designed for both aesthetic and feel. A slight taper from the waistband down to the bottom of the leg and a flat elastic waistband create a modern look while maintaining athletic comfort.
            </p>

            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>
                    Modern style fit features a shorter inseam and more snug in the thigh
                </li>
                <li><i class="bi bi-check-circle text-dark me-2">
                    </i>Fabric HydroTek | DeztekHeavy
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- PRO SHORT -->
<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">
                    PRO SHORT
                </h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pro Short offers increased and full range of mobility. A Dyno-panel is inserted between the front and back rise to improve your ability to get as low as possible on ground balls and playing defense. The fastened pockets (optional) keep items close to the body.
            </p>
            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>
                    Athletic Style fit that is more generous in the waist and legs
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>
                    Fabric HydroTek | DeztekHeavy
                </li>
            </ul>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShorts/PROSHORT/PROSHORTFront_2048x2048.webp') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShorts/PROSHORT/PROSHORTFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PROSHORT/PROSHORTBACK_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PROSHORT/PROSHORTLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/PROSHORT/PROSHORTRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>
    </div>
</section>

<!-- COLLEGIATE SHORT -->
<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShorts/COLLEGIATESHORT/COLLEGIATESHORTBack_2048x2048.webp') }}"
                alt="Pro Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShorts/COLLEGIATESHORT/COLLEGIATESHORTFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/COLLEGIATESHORT/COLLEGIATESHORTBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/COLLEGIATESHORT/COLLEGIATESHORTLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShorts/COLLEGIATESHORT/COLLEGIATESHORTRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">
                    COLLEGIATE SHORT
                </h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Collegiate short is our most basic construction short. A four panel garment that features simplicity, yet is fully sublimate-able for an infinite number of design options. The rollover waistband provides comfort and the overall classic style fit is generous and athletic.
            </p>
            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>
                    Athletic Style fit that is more generous in the waist and legs
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>
                    Fabric HydroTek | DeztekHeavy | LatTek
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- CUSTOMIZE YOUR LOOK -->
<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h2 class="display-4">CUSTOMIZE YOUR LOOK</h2>
            <!-- Main Image -->
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYRight_2048x2048.webp') }}" class="img-fluid w-100 mb-3" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h2 class="display-4">Get in touch</h2>

            <!-- Contact Form for Customization -->
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="source" value="Teamwear - Men's Shorts">
                <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
<div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" placeholder="I’m interested in shooter shirts..." name="message" rows="4">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</section>

<!-- Bottom GALERY -->
<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage1.webp') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage2.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage3.webp') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Middle Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage4.webp') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage5.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage6.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShorts/bottomBackgrounedImage7.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
</section>

<script>
    function changeImage(thumbnail) {
        // Get the image source of the clicked thumbnail
        var imagePath = thumbnail.src;
        // Find the main image in the same section by using the parent section's class or ID
        var section = thumbnail.closest('section'); // Find the closest parent section
        var mainImage = section.querySelector('.main-image'); // Find the main image inside this section

        // Update the main image source
        mainImage.src = imagePath;
    }
</script>

@endsection