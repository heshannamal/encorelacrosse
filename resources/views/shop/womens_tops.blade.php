@extends('layouts.app')

@section('title', "Women's Tops - Encore Lacrosse Apparel")

@section('content')
<section class="video-bg position-relative">
    <video autoplay muted loop playsinline class="w-100 h-100 position-absolute top-0 start-0" style="object-fit:cover;">
        <source src="{{ asset('videos/d83554ea37f446cca0e05e66a5f48189.mp4') }}" type="video/mp4">
    </video>
    <div class="position-relative d-flex align-items-end justify-content-center" style="min-height:100vh;">
        <div class="text-center px-5">
            <div class="px-4 py-3 mb-2 text-center bg-secondary text-white">
                <h5 class="mb-0">Women's Tops</h5>
            </div>
        </div>
    </div>
</section>

@include('shop.ecommerce._category-listing')
@endsection
