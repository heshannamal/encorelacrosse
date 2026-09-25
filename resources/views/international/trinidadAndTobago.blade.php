@extends('layouts.app')

@section('content')

<section class="bg-danger text-white text-center py-5">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3">
            TRINIDAD & TOBAGO LACROSSE
        </h1>
        <p class="fs-4 fw-normal">
            Building Champions on the Field
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-danger text-center fw-bold fs-1 mb-5">
            MISSION
        </h2>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="p-4 p-md-5 bg-white border border-light shadow-sm">
                    <p class="fs-5 text-dark lh-base">
                        Conduct lacrosse clinic in Trinidad & Tobago. Leave sticks and goals behind. Work with the ministry of sports in Trinidad & Tobago to create a sustainable field and box lacrosse national men's and women's program that will compete globally.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .card-glow-on-hover {
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .card-glow-on-hover:hover {
        box-shadow:
            0 0 10px rgba(255, 0, 0, 0.8),
            0 0 20px rgba(255, 0, 0, 0.4);
        transform: translateY(-3px);
        cursor: pointer;
    }

    .cta-button-hover {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        background-color: #f7f7f7;
    }

    .cta-button-hover:hover {
        transform: scale(1.02);
        filter: opacity(0.8);
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.4), 0 5px 15px rgba(0, 0, 0, 0.3) !important;
    }
</style>

@php
$professionals = [
['name' => 'Josh Byrnes', 'details' => 'Buffalo Bandits, Hofstra'],
['name' => 'Pat Harbeson', 'details' => 'Redwood LC, UVA'],
['name' => 'John Christmas', 'details' => 'Boston Cannons, UVA'],
];
@endphp

<section class="text-white pt-4 pb-5"
    style="background-color: #1d1d1d; border-top: 5px solid red;">
    <div class="container py-5">
        <h2 class="text-center fw-normal display-5 mb-5" style="letter-spacing: 0.1rem;">
            NOTABLE T&T HERITAGE PROFESSIONALS
        </h2>
        <div class="row justify-content-center g-4">

            @foreach ($professionals as $professional)
            <div class="col-lg-4 col-md-6">
                <div class="p-4 rounded-3 text-center h-100 card-glow-on-hover"
                    style="background-color: #242424; 
                            border: 1px solid rgba(255, 255, 255, 0.05);">

                    <h3 class="fw-bold fs-3 text-danger mb-2">
                        {{ $professional['name'] }}
                    </h3>

                    <p class="fs-5 mb-0">
                        {{ $professional['details'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #f7f7f7;">
    <div class="container py-4">
        <div class="row justify-content-center g-4">

            <div class="col-12 text-center">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSdrWBgAKGsl_FlBS4IFbKZUbXsladFFcURELHIpxMvX1ytjQg/viewform?usp=dialog" target="_blank" rel="noopener noreferrer" class="btn btn-lg fw-bold text-white d-block mx-auto py-3 cta-button-hover"
                    style="
                        max-width: 500px;
                        max-height: 200px;
                        background: #cc0000; 
                        border: none;
                        font-size: 1.8rem;
                        box-shadow: 0 0 15px rgba(255, 0, 0, 0.7), 0 0 5px rgba(200, 0, 0, 0.5);
                        border-radius: 10px;
                   ">
                    <span class="me-2">🏆</span> HERITAGE CUP <span class="ms-2">🏆</span>
                </a>
            </div>

            <div class="col-12 text-center mt-4">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSdiVQB-Ln5UEpH4x-x39ltSawF1gPtO9heqpazRo1Tv0azYwg/viewform?usp=dialog" target="_blank" rel="noopener noreferrer" class="btn btn-lg fw-bold text-white d-block mx-auto py-3 cta-button-hover"
                    style="
                        max-width: 800px;
                        max-height: 200px;
                        background: #008000; 
                        border: none;
                        font-size: 1.8rem;
                        box-shadow: 0 0 15px rgba(0, 128, 0, 0.8), 0 0 5px rgba(0, 100, 0, 0.6);
                        border-radius: 10px;
                   ">
                    <span class="me-2">💛</span> INTERESTED IN HELPING OUT <span class="ms-2">💛</span>
                </a>
            </div>

            <div class="col-12 text-center mt-5">
                <a href="https://www.instagram.com/trinidadandtobagolacrosse/#" target="_blank" class="btn btn-lg fw-normal text-white cta-button-hover"
                    style="
                        padding: 12px 30px;
                        background: linear-gradient(90deg, #ff8a00 0%, #e90089 100%);
                        border: none;
                        font-size: 1.2rem;
                        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                        border-radius: 50px;
                   ">
                    <i class="bi bi-instagram me-2"></i> Follow us on Instagram
                </a>
            </div>

        </div>
    </div>
</section>

@endsection