@extends('layouts.app')

@section('content')

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ asset('images/teamwear/womensRacerbacks/hero.webp') }}"
                class="img-fluid w-100"
                alt="Women's Custom Team Apparel"
                style="object-fit: cover; height: 100vh;">

            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3 w-100">
                <h2 class="display-3 fw-bold" style="font-family: 'Bebas Neue', sans-serif;">ENCORE CUSTOM TEAM APPAREL</h2>
                <p class="lead fs-4">HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.</p>
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000; display: inline-block;">
                        <strong>&nbsp; &nbsp; WOMEN'S GAME JERSEYS &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- COLLEGIATE RACERBACK -->
<section id="collegiate-racerback" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">
        <div class="col-12 col-md-6 text-center">
            <img
                src="{{ asset('images/teamwear/womensRacerbacks/collegiate-racerback-front.jpg') }}"
                alt="Collegiate Racerback"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/womensRacerbacks/collegiate-racerback-front.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Collegiate Racerback Front"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/collegiate-racerback-back.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Collegiate Racerback Back"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/collegiate-racerback-right.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Collegiate Racerback Right"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/collegiate-racerback-left.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Collegiate Racerback Left"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="border rounded-pill text-center py-2 px-3 mb-4"
                style="border: 2px solid #d3d3d3 !important; display: inline-block;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">COLLEGIATE RACERBACK</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Collegiate racerback is a more conservative cut, designed to be sturdy on the shoulders. This piece is reversible allowing for a home and away color.
            </p>

            <ul class="list-unstyled mt-4 text-secondary" style="font-size: 1rem; line-height: 1.8;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Raglan Sleeves</li>
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Fabric HydroTek | Deztek | Deztek Lite | LatTek</li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Modern style and fit built for the athletic girl and woman.</li>
            </ul>
        </div>
    </div>
</section>

<!-- PRO RACERBACK -->
<section id="pro-racerback" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">
        <div class="col-12 col-md-6">
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf !important; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">PRO RACERBACK</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                The Pro racerback allows for freedom of movement so that the player can focus on being fierce and in control. Thinner straps and a narrow back yoke cut creates a more secure feel. This piece is reversible allowing for a home and away color.
            </p>

            <ul class="list-unstyled mt-4 text-secondary" style="font-size: 1rem; line-height: 1.8;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Fabric HydroTek | Deztek | LatTek</li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Modern style and fit built for the athletic girl and woman.</li>
            </ul>
        </div>

        <div class="col-12 col-md-6 text-center">
            <img
                src="{{ asset('images/teamwear/womensRacerbacks/pro-racerback-front.jpg') }}"
                alt="Pro Racerback"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/womensRacerbacks/pro-racerback-front.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Pro Racerback Front"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/pro-racerback-back.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Pro Racerback Back"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/pro-racerback-right.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Pro Racerback Right"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/pro-racerback-left.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Pro Racerback Left"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>
    </div>
</section>

<!-- WOMEN'S PRO GAME JERSEY -->
<section id="womens-pro-game-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">
        <div class="col-12 col-md-6 text-center">
            <img
                src="{{ asset('images/teamwear/womensRacerbacks/womens-pro-game-jersey-front.jpg') }}"
                alt="Women's Pro Game Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">

            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <img src="{{ asset('images/teamwear/womensRacerbacks/womens-pro-game-jersey-front.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Women's Pro Game Jersey Front"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/womens-pro-game-jersey-back.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Women's Pro Game Jersey Back"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/womens-pro-game-jersey-right.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Women's Pro Game Jersey Right"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
                <img src="{{ asset('images/teamwear/womensRacerbacks/womens-pro-game-jersey-left.jpg') }}"
                    class="thumbnail img-thumbnail" alt="Women's Pro Game Jersey Left"
                    style="width: 80px; cursor: pointer;" onclick="changeImage(this)">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="border rounded-pill text-center py-2 px-4 mb-4"
                style="border: 2px solid #cfcfcf !important; display: inline-block; background-color: #fff;">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">WOMEN'S PRO GAME JERSEY</h2>
            </div>

            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                V neck with a t-shirt cut and belled sides. This shirt is a simple and classic game jersey that stays stylishly consistent in an era.
            </p>

            <ul class="list-unstyled mt-4 text-secondary" style="font-size: 1rem; line-height: 1.8;">
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Modern style slim fit.</li>
                <li class="mb-2"><i class="bi bi-check-circle text-dark me-2"></i>Fabric Deztek | Deztek Lite</li>
                <li><i class="bi bi-check-circle text-dark me-2"></i>Modern style and fit built for the athletic girl and woman.</li>
            </ul>
        </div>
    </div>
</section>

<!-- CUSTOMIZE YOUR LOOK -->
<section id="customize-your-look" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <h2 class="display-4 py-3 mb-0">CUSTOMIZE YOUR LOOK</h2>
            <img
                src="{{ asset('images/teamwear/womensRacerbacks/customize-01.jpg') }}"
                class="img-fluid w-100"
                alt="Customize Women's Game Jersey"
                style="object-fit: cover; width: 100%; min-height: 520px; height: 100%;">
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center p-4 p-lg-5">
            <h2 class="display-4">Get in touch</h2>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="source" value="Teamwear - Women's Game Jerseys">
                <input type="text" name="website" value="" autocomplete="off" tabindex="-1" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;pointer-events:none;">
<div class="form-group mb-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" value="{{ old('phone') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" placeholder="I'm interested in women's game jerseys..." name="message" rows="4">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
</section>

<!-- BOTTOM GALLERY -->
<section id="womens-game-jersey-gallery" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 col-md-6 d-flex flex-column align-items-center">
            <img src="{{ asset('images/teamwear/womensRacerbacks/lookbook-01.jpg') }}"
                class="img-fluid w-100" alt="Women's Lacrosse Apparel Look 1"
                style="object-fit: cover; width: 100%; height: 100%; min-height: 420px;">
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <img src="{{ asset('images/teamwear/womensRacerbacks/lookbook-02.jpg') }}"
                class="img-fluid w-100" alt="Women's Lacrosse Apparel Look 2"
                style="object-fit: cover; width: 100%; height: 100%; min-height: 420px;">
        </div>
    </div>

    <div class="row g-0">
        <div class="col-12 col-md-4 d-flex flex-column align-items-center">
            <img src="{{ asset('images/teamwear/womensRacerbacks/lookbook-03.jpg') }}"
                class="img-fluid w-100" alt="Women's Lacrosse Apparel Look 3"
                style="object-fit: cover; width: 100%; height: 100%; min-height: 380px;">
        </div>

        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('images/teamwear/womensRacerbacks/lookbook-04.jpg') }}"
                class="img-fluid w-100" alt="Women's Lacrosse Apparel Look 4"
                style="object-fit: cover; width: 100%; height: 100%; min-height: 380px;">
        </div>

        <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('images/teamwear/womensRacerbacks/lookbook-05.jpg') }}"
                class="img-fluid w-100" alt="Women's Lacrosse Apparel Look 5"
                style="object-fit: cover; width: 100%; height: 100%; min-height: 380px;">
        </div>
    </div>
</section>

<script>
    function changeImage(thumbnail) {
        var section = thumbnail.closest('section');
        var mainImage = section ? section.querySelector('.main-image') : null;

        if (mainImage) {
            mainImage.src = thumbnail.src;
        }
    }
</script>

@endsection
