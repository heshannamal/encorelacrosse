<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Our vision is to share lacrosse culture with the global community, and in turn, help make it better through those very same multicultural experiences and values that transcend the sport.">

    <title>@if(isset($title) && !empty($title)){{ $title }} - @endif Encore Lacrosse Apparel</title>

    <link rel="icon" href="{{ asset('images/Encore_Logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
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
                <a href="https://facebook.com/encorebrand" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://twitter.com/encorelacrosse" target="_blank" rel="noopener" aria-label="X / Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="https://instagram.com/encorelacrosse" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/user/encorebrand" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>

            <p class="footer-copy">© {{ now()->year }} Encore Lacrosse Apparel &nbsp; | &nbsp; Powered by Encore Custom</p>

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
    <script src="{{ asset('js/site.js') }}"></script>
    @stack('scripts')
</body>
</html>
