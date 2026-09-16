@extends('layouts.app')

@section('content')

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <!-- Image and Content Column -->
        <div class="col-12 position-relative">
            <img src="{{ asset('images/teamwear/mensGameJerseys/backgroundImage.jpg') }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h2 class="display-3 fw-bold" style="Font-Family: 'Bebas Neue', sans-serif;">ENCORE CUSTOM TEAM APPAREL</h2>
                <p class="lead fs-4">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
                <!-- <p class="btn btn-dark btn-lg mt-3 rounded-0" style="border-radius: 0 !important;">MEN'S GAME JERSEYS</a>
                </p> -->
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; &nbsp; &nbsp; Men's Game Jerseys&nbsp; &nbsp; &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- COLLEGIATE GAME JERSEY -->
<section id="collegiate-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">>
    <div class="row align-items-center g-5">

        <!-- Left Column (Image + Thumbnails) -->
        <div class="col-12 col-md-6 text-center">
            <!-- Main Image -->
            <img id="main-image"
                src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYFront_2048x2048.webp') }}"
                alt="Collegiate Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail"
                    style="width: 80px; cursor: pointer;"
                    onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYRight_2048x2048.webp') }}"
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
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">Collegiate Game Jersey</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Collegiate Jersey is the most basic jersey in our offerings. It is designed to be lightweight and breathable,
                with a minimal amount of additional paneling and stitching. Like the collegiate short, it is fully sublimatable
                and offers unlimited design options.
            </p>

            <ul class="list-unstyled mt-4" style="font-size: 1rem;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Classic T-Cut Sleeves</li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Available as a reversible game jersey</li>
            </ul>
        </div>
    </div>
</section>

<!-- PRO 2.0 GAME JERSEY -->
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
                src="{{ asset('images/teamwear/mensGameJerseys/PRO20GAMEJERSEY/PRO20GAMEJERSEYFront_2048x2048.webp') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PRO20GAMEJERSEY/PRO20GAMEJERSEYFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PRO20GAMEJERSEY/PRO20GAMEJERSEYBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PRO20GAMEJERSEY/PRO20GAMEJERSEYLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PRO20GAMEJERSEY/PRO20GAMEJERSEYRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>
    </div>
</section>

<!-- PRO GAME JERSEY -->
<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensGameJerseys/PROGAMEJERSEY/PROGAMEJERSEYBack_2048x2048.webp') }}"
                alt="Pro Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <!-- Thumbnails -->
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PROGAMEJERSEY/PROGAMEJERSEYFront_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PROGAMEJERSEY/PROGAMEJERSEYBack_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PROGAMEJERSEY/PROGAMEJERSEYLeft_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/mensGameJerseys/PROGAMEJERSEY/PROGAMEJERSEYRight_2048x2048.webp') }}"
                    class="thumbnail img-thumbnail" style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
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

<!-- FRONTIER GAME JERSEY -->
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
                src="{{ asset('images/teamwear/mensGameJerseys/FRONTIERGAMEJERSEY.jpg') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>
    </div>
</section>

<!-- BOX SWEATER -->
<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/teamwear/mensGameJerseys/BOXSWEATER.jpg') }}"
                alt="Pro Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6">
            <!-- Outlined Heading -->
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">BOX SWEATER</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Box Sweater was created specifically for the demands of the indoor game.
                Its fit allows for all the necessary protective equipment, but is snug enough to prohibit defenders from grabbing your jersey to slow you down.
                Two ply shoulders help brace the impact of cross checks and five minute majors.
            </p>
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
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/COLLEGIATEGAMEJERSEY/COLLEGIATEGAMEJERSEYRight_2048x2048.webp') }}" class="img-fluid w-100 mb-3" alt="Main Product Image"
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
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage1.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage2.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage3.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Middle Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage4.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage5.avif') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
    <div class="row g-0">
        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage6.jpg') }}" class="img-fluid w-100" alt="Main Product Image"
                style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img id="main-image" src="{{ asset('images/teamwear/mensGameJerseys/bottomBackgrounedImage7.jpg') }}" class="img-fluid w-100" alt="Main Product Image"
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