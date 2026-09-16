@extends('layouts.app')

@section('content')

<!-- Hero Section (Image Background) -->
<!-- <section class="video-bg position-relative">
    <video autoplay muted loop class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;">
        <source src="{{ asset('videos/d6ecd50b71054bfab68a7843c19122c9.mp4') }}" type="video/mp4">
        <img src="{{ asset('images/Bags.jpg') }}" class="card-img-top" alt="">
    </video> -->
<!-- Hero Section (Image Background) -->
<section class="image-bg position-relative">
    <img src="{{ asset('images/Bags.jpg') }}"
        alt="Bags"
        class="w-100 h-100 position-absolute top-0 start-0"
        style="object-fit: cover; z-index: -1;">
    <!-- <div class="content position-relative text-center text-white">
        <h1></h1>
        <p>Shop our exclusive collection now!</p>
    </div> -->

<!-- Content overlaying the video -->
<div class="container position-relative z-index-2">
    <!-- <div class="row justify-content-center align-items-end" style="min-height: 100vh; width: 50vh;"> -->
    <div class="row justify-content-center align-items-end" style="min-height: 100vh;">
        <div class="p-3 mb-2 col-12 text-center bg-secondary text-white">
            <h5>Bags</h5>
        </div>
    </div>
</div>
</section>

<!-- Product Grid Section -->
<section class="product-grid mt-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $product['image']) }}" class="card-img-top" alt="{{ $product['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">${{ number_format($product['price'], 2) }}</p>
                        <!-- <a href="#" class="btn btn-primary">View Details</a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection