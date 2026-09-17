@extends('layouts.app')

@section('content')

<!-- Hero Section (Video Background) -->
<section class="video-bg position-relative">
    <video autoplay muted loop class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;">
        <source src="{{ asset('videos/d83554ea37f446cca0e05e66a5f48189.mp4') }}" type="video/mp4">
    </video>

    <div class="position-relative d-flex align-items-end justify-content-center" style="min-height: 100vh;">
        <div class="text-center px-5">
            <div class="px-4 py-3 mb-2 text-center bg-secondary text-white">
                <h5 class="mb-0">Women's Tops</h5>
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
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection