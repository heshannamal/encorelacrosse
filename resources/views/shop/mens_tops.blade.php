@extends('layouts.app')

@section('content')

<!-- Hero Section (Video Background) -->
<section class="video-bg position-relative">
    <video autoplay muted loop class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;">
        <source src="{{ asset('videos/d6ecd50b71054bfab68a7843c19122c9.mp4') }}" type="video/mp4">
    </video>

    <!-- Content overlaying the video -->
    <div class="position-relative d-flex align-items-end justify-content-center" style="min-height: 100vh;">
        <div class="text-center px-5">
            <div class="p-3 mb-2 col-12 text-center bg-secondary text-white">
                <h5>Men's Tops</h5>
            </div>
        </div>
    </div>
</section>

<!-- Product Grid Section -->
<section class="product-grid py-4 py-md-5">
    <div class="container-fluid px-3 px-md-4 px-lg-5">
        <div class="row g-3 g-md-4">
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