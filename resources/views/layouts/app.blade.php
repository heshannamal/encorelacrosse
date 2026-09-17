<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#c40000">
    <meta name="description" content="Our vision is to share lacrosse culture with the global community, and in turn, help make it better through those very same multicultural experiences and values that transcend the sport.">

    <title>@if(isset($title) && $title){{ $title }} - @endif Encore Lacrosse Apparel</title>

    <link rel="icon" href="{{ asset('images/Encore_Logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">

    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <main class="site-main">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    @stack('scripts')
</body>
</html>
