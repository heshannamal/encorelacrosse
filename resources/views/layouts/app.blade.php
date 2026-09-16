<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#c40000">
    <meta name="description" content="Our vision is to share lacrosse culture with the global community, and in turn, help make it better through those very same multicultural experiences and values that transcend the sport.">

    <title>@if(isset($title) && !empty($title)){{ $title }} - @endif Encore Lacrosse Apparel</title>

    <link rel="icon" href="{{ asset('images/Encore_Logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Oswald:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --encore-red: #c40000;
            --encore-text: #303030;
            --encore-muted: #6f6f6f;
        }

        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            color: var(--encore-text);
            background: #fff;
            font-family: 'Open Sans', Arial, sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6,
        .navbar-nav .nav-link,
        .footer-nav a {
            font-family: 'Oswald', 'Arial Narrow', Arial, sans-serif;
            text-transform: uppercase;
        }

        .site-main { padding-top: 62px; }

        .site-footer {
            background: #d7d7d7;
            color: #555;
            padding: 34px 0 26px;
            text-align: center;
        }

        .footer-nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px 22px;
            margin-bottom: 16px;
        }

        .footer-nav a {
            color: #555;
            font-size: 11px;
            letter-spacing: .03em;
            text-decoration: none;
        }

        .footer-nav a:hover { color: #111; }

        .footer-socials {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .footer-socials a {
            color: #4a4a4a;
            font-size: 15px;
            line-height: 1;
        }

        .footer-copy {
            margin: 0 0 10px;
            color: #737373;
            font-size: 9px;
        }

        .footer-payments {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .footer-payment {
            min-width: 32px;
            padding: 2px 5px;
            border: 1px solid #9c9c9c;
            border-radius: 2px;
            background: #ececec;
            color: #555;
            font-size: 7px;
            font-weight: 700;
            line-height: 1.2;
        }

        @media (max-width: 991.98px) {
            .site-main { padding-top: 58px; }
            .site-footer { padding-top: 28px; }
            .footer-nav { gap: 8px 14px; }
        }
    </style>

    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <main class="site-main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container-fluid px-3 px-md-4">
            <nav class="footer-nav" aria-label="Footer navigation">
                <a href="{{ route('shop.mens-tops') }}">Shop</a>
                <a href="{{ route('teamwear.allTeamwear') }}">Teamwear</a>
                <a href="{{ route('custom.customGraphicDesign') }}">Custom</a>
                <a href="{{ route('events.battleOfTheBay') }}">Events</a>
                <a href="{{ route('international.sriLanka') }}">International</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('privateTraining') }}">Private Training</a>
            </nav>

            <div class="footer-socials" aria-label="Social links">
                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" aria-label="X / Twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com/encorelacrosse/" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>

            <p class="footer-copy">© 2025 Encore Lacrosse Apparel &nbsp; | &nbsp; Powered by Encore Custom</p>

            <div class="footer-payments" aria-label="Accepted payment methods">
                <span class="footer-payment">VISA</span>
                <span class="footer-payment">MC</span>
                <span class="footer-payment">AMEX</span>
                <span class="footer-payment">PAYPAL</span>
                <span class="footer-payment">APPLE PAY</span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
