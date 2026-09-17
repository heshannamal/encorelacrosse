@extends('layouts.app')

@section('content')

<!-- Hero Section (Image Background) -->
<section class="image-bg position-relative" style="min-height: 100vh; overflow: hidden;">
    <img src="{{ asset('images/Bags.jpg') }}"
        alt="Bags"
        class="w-100 h-100 position-absolute top-0 start-0"
        style="object-fit: cover; z-index: -1;">

    <div class="position-relative d-flex align-items-end justify-content-center" style="min-height: 100vh;">
        <div class="text-center px-5">
            <div class="px-4 py-3 mb-2 text-center bg-secondary text-white">
                <h5 class="mb-0">Bags</h5>
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