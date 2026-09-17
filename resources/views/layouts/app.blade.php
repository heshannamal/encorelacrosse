<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title')@yield('title')@else@if(isset($title) && !empty($title)){{ $title }} - @endif{{ config('app.name', 'Encore') }} Lacrosse Apparel@endif</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Karla:wght@400;500;600;700;800&family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600;700&family=Oswald:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family:'Open Sans',sans-serif; color:#303030; overflow-x:hidden; }
        h1,h2,h3,h4,h5,h6,.navbar-nav .nav-link,.btn-custom { font-family:'Oswald',sans-serif; text-transform:uppercase; }
        .video-bg { position:relative; width:100%; height:100vh; overflow:hidden; }
        .video-bg video { width:100%; height:100%; object-fit:cover; }
        .video-overlay { position:absolute; inset:0; background:rgba(0,0,0,.35); display:flex; align-items:center; justify-content:center; color:white; text-align:center; }
        .carousel-item img { object-fit:cover; height:100vh; }
        .event-section,.container-fluid { margin:0; padding:0; }
        .row.g-0 { margin:0; }
        .col-md-6.col-lg-3 { padding:0; }
        .event-card { position:relative; overflow:hidden; cursor:pointer; transition:transform .3s ease; }
        .event-img { width:100%; height:100%; object-fit:cover; transition:transform .6s ease,filter .3s ease; }
        .event-card:hover .event-img { transform:scale(1.05); filter:brightness(.50); }
        .event-button { position:absolute; bottom:0; left:0; right:0; opacity:0; transition:all .4s ease; }
        .event-card:hover .event-button { opacity:1; }
        .btn-danger { width:100%; border-radius:0; background-color:#d71920; border:none; padding:10px 0; font-weight:600; text-transform:uppercase; transition:background-color .3s ease; }
        .btn-danger:hover { background-color:#b3121a; }
    </style>
    @stack('styles')
</head>
<body>
    @include('layouts.navbar')
    @include('shop.ecommerce._header-tools')

    <main class="pt-5">
        @yield('content')
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
