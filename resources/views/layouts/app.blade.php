<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>{{ config('app.name', 'Encore Lacrosse Apparel') }}</title> -->

    <title>
        @if (isset($title) && !empty($title))
        {{ $title }} -
        @endif

        {{ config('app.name', 'Encore') }} Lacrosse Apparel
    </title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&family=Oswald:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Steelfish Regular:wght@500&display=swap" rel="stylesheet">
    <style>
        /* Critical CSS for immediate rendering */
        body {
            font-family: 'Open Sans', sans-serif;
            color: #303030;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .navbar-nav .nav-link,
        .btn-custom {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
        }

        .video-bg {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .video-bg video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        /* .navbar-brand img {
            height: 40px;
        } */

        footer {
            background: #111;
            color: #bbb;
            padding: 2rem 0;
        }

        footer a {
            color: #bbb;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        .carousel-item img {
            object-fit: cover;
            height: 100vh;
        }

        /* .carousel-caption {
            background: rgba(0, 0, 0, 0.4);
            padding: 1.5rem;
            border-radius: 0.5rem;
        } */

        /* Remove all spacing */
        .event-section {
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            margin: 0;
            padding: 0;
        }

        .row.g-0 {
            margin: 0;
        }

        .col-md-6.col-lg-3 {
            padding: 0;
        }

        /* Card styling */
        .event-card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .event-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease, filter 0.3s ease;
        }

        .event-card:hover .event-img {
            transform: scale(1.05);
            filter: brightness(0.50);
        }

        /* Centered button */
        .event-button {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            /* transform: translate(-50%, 0); */
            opacity: 0;
            transition: all 0.4s ease;
        }

        .event-card:hover .event-button {
            opacity: 1;
            /* transform: translate(-50%, -5px); */
        }

        /* Button style */
        .btn-danger {
            width: 100%;
            border-radius: 0;
            background-color: #d71920;
            border: none;
            padding: 10px 0;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #b3121a;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    @extends('layouts.navbar')

    <main class="pt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-muted text-bold text-lg-start border-top mt-5" style="background-color:#d3d3d3;">
        <div class="container py-4">
            <!-- Top navigation links -->
            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">Shop</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">Teamwear</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">Custom</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">Events</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">International</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">About</a>
                    <a href="#" class="text-decoration-none text-dark text-uppercase mx-2 small">Private Training</a>
                </div>
            </div>

            <!-- Social media icons -->
            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <a href="#" class="text-dark mx-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-dark mx-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-dark mx-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-dark mx-2"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row justify-content-center">
                <div class="col-auto">
                    <p class="small mb-1">© 2025 Encore Lacrosse Apparel | Powered by Encore Custom</p>
                </div>
            </div>

            <!-- Payment icons -->
            <div class="row justify-content-center">
                <div class="col-auto">
                    <img src="visa.png" alt="Visa" class="mx-1" style="height:24px;">
                    <img src="mastercard.png" alt="Mastercard" class="mx-1" style="height:24px;">
                    <img src="paypal.png" alt="PayPal" class="mx-1" style="height:24px;">
                    <img src="applepay.png" alt="Apple Pay" class="mx-1" style="height:24px;">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="css/bootstrap-icons.css" rel="stylesheet"> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="js/bootstrap.bundle.min.js"></script> -->

</body>

</html>