@extends('layouts.app')

@section('content')

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Image and Content Column -->
        <div class="col-12 position-relative">
            <img src="{{ asset('images/teamwear/mensShooterShirts/backgroundImage.jpg') }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h2 class="display-3 fw-bold" style="Font-Family: 'Bebas Neue', sans-serif;">ENCORE CUSTOM TEAM APPAREL</h2>
                <p class="lead fs-4">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
                <!-- <p class="btn btn-dark btn-lg mt-3 rounded-0" style="border-radius: 0 !important;">MEN'S GAME JERSEYS</a>
                </p> -->
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; &nbsp; &nbsp;Shooters&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- Men's pro shooter -->
<section id="collegiate-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">>
    <div class="row align-items-center g-5">

        <!-- Left Column (Image + Thumbnails) -->
        <div class="col-12 col-md-6 text-center">
            <!-- Main Image -->
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterFront_2048x2048.webp') }}"
                alt="Collegiate Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterRight_2048x2048.webp') }}"
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
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">Men's pro shooter</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pro Shooter features a raglan style cut to allow full mobility in the shoulders. 4 way stretch fabrics also allow full range of motion and maximum comfort.
            </p>

            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Raglan Sleeves
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Fabric Deztek | DeztekHeavy
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Embellishment Sublimation
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- PRO LONG SLEEVE SHOOTER SHIRT -->
<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">PRO LONG SLEEVE SHOOTER SHIRT
                </h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                Experience maximized comfort and boundless athletic freedom with the raglan shoulder cut long sleeve tee. Marked as outstanding with 4 way stretch fabrics for unsurpassable mobility. Custom sublimation or screen print embellishment available. Get the standard in DezTek, DezTek Heavy or VersaTek instead. Which is yours?
            </p>
            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Raglan Long Sleeves
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Fabric Deztek | DeztekHeavy | VersaTek
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Embellishment Sublimation
                </li>
            </ul>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterFront_2048x2048.webp') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>
    </div>
</section>

<!-- Men's COLLEGIATE shooter -->
<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterBack_2048x2048.webp') }}"
                alt="Pro Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">Men's COLLEGIATE shooter</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Men's Collegiate Shooter offers a bell shaped fit, and cap sleeves.
            </p>
            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>T-Cut style shooter
                </li>
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Modern fit cut with side slits
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>DezTek fabric is fully sublimatable with no limitation in design options, including full color artwork in any location, player name and individual #’s
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>VersaTek fabric can be embellished with screen print
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- COLLEGIATE LONG SLEEVE SHOOTER SHIRT -->
<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">FRONTIER GAME JERSEY</h2>
            </div>
            <h5>COLLEGIATE LONG SLEEVE SHOOTER SHIRT</h5>
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Men's Long sleeve Collegiate Shooter offers a bell shaped fit, and cap Long Sleeves.
            </p>
            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>T-Cut style shooter
                </li>
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Modern fit cut with side slits
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>DezTek fabric is fully sublimatable with no limitation in design options, including full color artwork in any location, player name and individual #’s
                </li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>VersaTek fabric can be embellished with screen print
                </li>
            </ul>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterFront_2048x2048.webp') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensShooterShirts/Men_sLSShooter/Men_sLSShooterRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
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
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/Men_sProShooter/Men_sProShooterRight_2048x2048.webp') }}" class="img-fluid w-100 mb-3" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h2 class="display-4">Get in touch</h2>

            <!-- Contact Form for Customization -->
            <form action="/submit-form" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" placeholder="I’m interested in shooter shirts..." name="message" rows="4"></textarea>
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
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage1.webp') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage2.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage3.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Middle Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage4.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage5.webp') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage6.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensShooterShirts/bottomBackgrounedImage7.webp') }}" class="img-fluid w-100" alt="Main Product Image"
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