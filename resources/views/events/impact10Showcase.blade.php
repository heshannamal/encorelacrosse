@extends('layouts.app')

@section('content')

@php
$image1 = asset('images/event/theBattleOfTheBay/image1.avif');
$image3 = asset('images/event/theBattleOfTheBay/image3.avif');
$image4 = asset('images/event/theBattleOfTheBay/image4.avif');
$image5 = asset('images/event/theBattleOfTheBay/image5.avif');
$image6 = asset('images/event/theBattleOfTheBay/image6.avif');
$image7 = asset('images/event/theBattleOfTheBay/image7.avif');
$image8 = asset('images/event/theBattleOfTheBay/image8.avif');
$image9 = asset('images/event/theBattleOfTheBay/image9.avif');
@endphp

<section id="impact-showcase" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/VJopikeTku8?autoplay=1&autohide=1&modestbranding=0&rel=0&showinfo=0&controls=0&disablekb=1&enablejsapi=1&iv_load_policy=3&hd=1&mute=1&loop=1&playlist=VJopikeTku8&origin=https%3A%2F%2Fencorelacrosse.com&widgetid=1&forigin=https%3A%2F%2Fencorelacrosse.com%2Fpages%2Fimpact10-showcase&aoriginsup=1&gporigin=https%3A%2F%2Fencorelacrosse.com%2Fpages%2Fbattle-of-the-bay&vf=6"
                    class="embed-responsive-item" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen frameborder="0" title="Impact 10 Recruiting Event | Day 1">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section id="event-content" class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="bg-warning text-white text-center p-3 rounded shadow-lg mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-uppercase mb-0 text-dark">
                    IMPACT 10 SHOWCASE 2025
                </h2>
            </div>
            <p class="fs-5 text-secondary mx-auto mb-4" style="max-width: 700px;">
                One of the premier training and education on the west coast! Our goal is to provide teaching and information to the players while providing them a platform to be trained by as many college coaches as possible.
            </p>
            <p class="lead fw-semibold text-dark mb-2">
                Get Game-Ready with the Impact 10 Showcase
            </p>
            <p class="text-primary fw-bold text-uppercase mb-5">
                This event is your chance to elevate your game!
            </p>
            <div class="bg-warning text-white text-center p-3 rounded shadow-lg mb-5 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-uppercase mb-0 text-dark">
                    COMING SOON
                </h2>
            </div>
            <h5 class="text-uppercase fw-bold text-dark mb-4 mt-5">
                2024 IMPACT 10 LACROSSE SHOWCASE HIGHLIGHTS
            </h5>
            <div class="ratio shadow-lg overflow-hidden border border-1 border-light mx-auto" style="--bs-aspect-ratio: calc(16 / 9 * 100%); max-width: 400px;">
                <video id="video2024" controls autoplay loop muted playsinline class="w-100 h-100 object-cover" style="object-fit: cover;">
                    <source src="{{ asset('images/event/impact10Showcase/84e02c5258f34ff8a8e269a90ddba1bb.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>

<section id="sponsors" style="background-color: #f7f7f7; padding-top: 3rem; padding-bottom: 3rem;">

    <div class="container mb-4 bg-dark text-white p-3 rounded shadow-lg">
        <h2 class="text-center">IMPACT 10 SPONSORS</h2>
    </div>

    <div class="mx-auto px-3" style="max-width: 1400px;">
        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">

            <div class="col">
                <div class="shadow-lg rounded-3 border border-1 border-light p-3 h-100 d-flex align-items-center justify-content-center bg-white">
                    <img src="{{ asset('images/event/impact10Showcase/image1.jpg') }}" alt="Bay Alarm Sponsor" class="img-fluid" style="max-height: auto; width: auto;">
                </div>
            </div>

            <div class="col">
                <div class="shadow-lg rounded-3 border border-1 border-light p-3 h-100 d-flex align-items-center justify-content-center bg-white">
                    <img src="{{ asset('images/event/impact10Showcase/image2.jpg') }}" alt="LET Sponsor" class="img-fluid" style="max-height: auto; width: auto;">
                </div>
            </div>

        </div>
    </div>
</section>

<section id="sf-attractions" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 text-white py-5" style="background-image: url('{{ $image1 }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; min-height: 500px; background-blend-mode: multiply;">
            <div class="container text-center pt-3 pb-5">
                <h2 class="display-6 fw-bold text-uppercase text-warning underline" style="text-shadow: 1px 1px 3px #000;">
                    LOCAL SAN FRANCISCO ATTRACTIONS
                </h2>
            </div>

            <div class="container pb-5">
                <div class="row row-cols-2 row-cols-md-3 g-3 g-md-4 justify-content-center">

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image3 }}" alt="Alcatraz" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image4 }}" alt="Cable Car" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image5 }}" alt="Coit Tower" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image6 }}" alt="Fisherman's Wharf" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image7 }}" alt="Golden Gate Bridge" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>

                    <div class="col">
                        <div class="position-relative overflow-hidden shadow-lg rounded-3 cursor-pointer" style="padding-bottom: 66.66%;">
                            <img src="{{ $image8 }}" alt="Painted Ladies" class="position-absolute img-cover hover-scale-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .img-cover {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
</style>

@endsection