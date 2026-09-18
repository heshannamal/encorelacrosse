@extends('layouts.app')

@section('title', 'Bags - Encore Lacrosse Apparel')

@section('content')
<section class="image-bg position-relative" style="min-height:100vh;overflow:hidden;">
    <img src="{{ asset('images/Bags.jpg') }}"
         alt="Bags"
         class="w-100 h-100 position-absolute top-0 start-0"
         style="object-fit:cover;z-index:-1;">

    <div class="position-relative d-flex align-items-end justify-content-center" style="min-height:100vh;">
        <div class="text-center px-5">
            <div class="px-4 py-3 mb-2 text-center bg-secondary text-white">
                <h5 class="mb-0">Bags</h5>
            </div>
        </div>
    </div>
</section>

@include('shop.ecommerce._legacy-product-grid')
@endsection
