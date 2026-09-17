@php
    $title = 'Private Training'; // Define the page-specific title here
@endphp

@extends('layouts.app')

@section('content')

<section id="custom-team-apparel" class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-12 position-relative">
            <img src="{{ asset('images/privatetraning/backgroundImage.jpg') }}" class="img-fluid w-100" alt="Custom Team Apparel" style="object-fit: cover; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3">
                <h1 class="gf_gs-text-heading-2 mt-3">
                    <span style="background-color: rgba(226, 226, 226, 0.8); padding: 0.5rem 1rem; color: #000;">
                        <strong>&nbsp; &nbsp; &nbsp; &nbsp; PRIVATE TRAINING &nbsp; &nbsp; &nbsp; &nbsp;</strong>
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>

<section id="COACH CHRISTMAS" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <div class="rounded-pill text-left py-1 px-1 mb-4">
            <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">
                COACH CHRISTMAS
            </h2>
        </div>
        <!-- Left Column (Image + Thumbnails) -->
        <div class="col-12 col-md-6 text-center">
            <!-- Main Image -->
            <img id="main-image"
                src="{{ asset('images/privatetraning/image1.jpg') }}"
                alt="COACH CHRISTMAS"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>

        <!-- Right Column (Text Content) -->
        <div class="col-12 col-md-6">
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                There are some key methods I've used over the years to deal with different players' needs. They include mimicking my movements or the style of a certain desired player, marking (positive reinforcements), capturing (using advanced players in the same age range within the group to model a certain skill), shaping (literally hands-on molding and breakdown of movements, similar to a yoga instructor manually correcting form).
                I focus on developing advanced techniques that deal with upper and lower body mechanics of shooting on the run, and time and room. I also work on the proper form for effective and deceptive feeding and shooting — this involves using eyes, head, and shoulders to hold and freeze goalies and defensemen.
            </p>
        </div>
    </div>
</section>

<section id="pro2-jersey" class="container-fluid py-5 px-md-5">
    <div class="row align-items-center g-5">

        <!-- Left Column (Text Section) -->
        <div class="col-12 col-md-6">
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                I break down dodging into segments: the approach, contacts, acceleration, hands (making sure you have hands on your stick in a position so you're ready to shoot or pass), and finishing. These steps will make it easier to adjust to any defensive player. It's crucial to emphasize the importance of balance and the player's decision to control body movements.
                I stress the importance of having soft hands, “catching the ball deep,” and getting rid of unnecessary cradling when a player is in possession of the ball.
                I've recently included video assessments of players. This is crucial in a player’s development and lends to my motto: “Seeing is believing.” We also work on moving without the ball, identifying the best passing lanes, and anticipating the ball carrier's movement. Lastly, upon request, I give players’ game film of a certain player who they should try to mold their game after.
            </p>
        </div>

        <!-- Right Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/privatetraning/image2.jpg') }}"
                alt="Pro 2.0 Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>
    </div>
</section>

<!-- PRO GAME JERSEY -->
<section id="pro-jersey" class="container-fluid py-5 px-md-5" style="background-color: #f7f7f7;">
    <div class="row align-items-center g-5">

        <!-- Left Column (Image Section) -->
        <div class="col-12 col-md-6 text-center">
            <img id="main-image"
                src="{{ asset('images/privatetraning/image3.jpg') }}"
                alt="Pro Jersey"
                class="main-image img-fluid rounded shadow-sm mb-4"
                style="max-height: 480px; object-fit: contain;">
        </div>

        <!-- Right Column (Text Section) -->
        <div class="col-12 col-md-6">
            <p class="text-secondary" style="font-size: 1rem; line-height: 1.8;">
                I've trained 100-plus All Americans and have coached high-level middle- and high-school teams, Dukes Lacrosse Club, the No. 1 select summer travel team in the country, and a year of Division 1 college lacrosse.
                More importantly, the things I've learned from playing alongside and against the best players in the world — from the MLL, NLL, LXMPro, and the club tour circuit — has made me well-equipped to be innovative and in the forefront of the modern lacrosse player.
            </p>
            <div class="rounded-pill text-center py-2 px-4 mb-4">
                <h2 class="fw-normal text-uppercase m-0" style="letter-spacing: 1px;">"modern day lacrosse player”</h2>
            </div>
        </div>
    </div>
</section>

@endsection