@extends('layouts.app')

@section('content')

@php
// --- Hero & Logos ---
$heroBgImage = asset('images/event/kingsShowcase/backgroundImage.jpg');

// --- Hotels ---
$suncoastImg = asset('images/event/kingsShowcase/image1.JPG');
$bestWesternImg = asset('images/event/kingsShowcase/image2.avif');
$rodewayInnImg = asset('images/event/kingsShowcase/image3.avif');
$cirqueImg1 = asset('images/event/kingsShowcase/image4.jpg');

// --- Extras ---
$photoImg = 'https://ucarecdn.com/2f98d829-706d-4b02-946b-312ce2c12c00/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$diningImg = 'https://ucarecdn.com/f4b4b84e-881a-4b08-83c1-796cc434b64a/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg1 = 'https://ucarecdn.com/7952a89b-5e09-4fef-a929-56e64436f882/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg2 = 'https://ucarecdn.com/d732b3a4-3741-4700-ae10-6a2db956ffd0/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg3 = 'https://ucarecdn.com/07f59c4d-e7ae-4383-886d-a8c0b4f766ef/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg4 = 'https://ucarecdn.com/c6264014-9ab7-4d94-8755-f269138627e3/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg5 = 'https://ucarecdn.com/aef2d477-75ec-4610-ab55-646fe3e3c652/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg6 = 'https://ucarecdn.com/9b6fc768-b076-420e-8283-70598141c3d7/-/format/auto/-/preview/3000x3000/-/quality/lighter/';

// --- Sponsors (Bottom) ---
$sponsor1 = 'https://ucarecdn.com/4951de49-397b-47d9-9c97-67cabb2be537/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor2 = 'https://ucarecdn.com/6f7fd01d-b512-4d48-9e86-486311b8dccc/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor3 = 'https://ucarecdn.com/18ac11b0-a1e6-4f3e-bf0b-62d0cf6285b4/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor4 = 'https://ucarecdn.com/773ce5f2-f892-4179-878b-6a4efd2133e9/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor5 = 'https://ucarecdn.com/37057c78-d1f0-410a-a008-c1da2a135abb/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor6 = 'https://ucarecdn.com/f16c3a6e-8ccf-4eb8-b7ee-b47640d8ea78/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor7 = 'https://ucarecdn.com/e3e9ec5f-9b21-47e0-8e82-727c2f1fb04b/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor8 = 'https://ucarecdn.com/633ef155-be8d-47e2-a41b-10eafcd62843/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor9 = 'https://ucarecdn.com/3045124f-c4a7-4789-b76b-ba6b9761a333/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor10 = 'https://ucarecdn.com/a44e8ae2-2b20-4b3c-be27-17d5ee107eb4/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor11 = 'https://ucarecdn.com/07356972-4639-4e35-8ebf-33c621873f8c/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$sponsor12 = 'https://ucarecdn.com/d2bf749d-d0fd-451d-b86b-0307f6280477/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
@endphp

<section class="position-relative d-flex align-items-center justify-content-center text-center text-white"
    style="background-image: url('{{ $heroBgImage }}'); background-size: cover; background-position: center; min-height: 500px;">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50"></div>
    <div class="position-relative z-2 container py-5">
        <h1 class="display-4 fw-bold text-uppercase">JANUARY 24th - 25th, 2026</h1>
    </div>
</section>

<!-- {{-- Event Details & Pricing --}} -->
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 text-uppercase text-danger">Event Details</h2>
        <p class="lead text-muted">San Francisco</p>
    </div>

    <div class="row g-4">
        <!-- {{-- Location Card --}} -->
        <div class="col-lg-6 hover-shadow-lg">
            <div class="card h-100 shadow-sm">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h3 class="h4 fw-bold d-flex align-items-center">
                        <span class="d-inline-block rounded-circle bg-danger me-2" style="width: 8px; height: 8px;"></span> Location
                    </h3>
                </div>
                <div class="card-body px-4">
                    <div class="bg-light p-3 rounded border border-start-4 border-danger mb-3">
                        <div class="fw-bold text-danger h5">Beach Chalet Fields</div>
                        <p class="mb-0 text-muted">1598 John F Kennedy Drive<br>San Francisco, CA 94121</p>
                    </div>
                    <div class="ratio ratio-16x9 rounded overflow-hidden">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3220.410276042691!2d-115.27169292418986!3d36.1809026724301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c06bef3f15fb%3A0xea7339afff0a5809!2sKellogg%20Zaher%20Sports%20Complex!5e0!3m2!1sen!2slk!4v1756030495285!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12615.724692153659!2d-122.493225!3d37.768212!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808587a06929e577%3A0x19e35e0ef5c13401!2sGolden%20Gate%20Park%20Polo%20Field!5e0!3m2!1sen!2slk!4v1763513206265!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- <div class="bg-danger text-white p-3 rounded text-center mt-3 shadow-sm">
                        <div class="h5 mb-1">Team Tournament Dates</div>
                        <div class="fw-bold h4">Saturday/Sunday, November 1st - 2nd</div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- {{-- Divisions & Pricing Card --}} -->
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h3 class="h4 fw-bold mb-3 d-flex align-items-center">
                        <span class="d-inline-block rounded-circle bg-danger me-2" style="width: 8px; height: 8px;"></span> Divisions
                    </h3>

                    @php
                    $divisions = [
                    ['name' => 'Boys HS', 'age' => '(2026, 2027, HS Open)', 'games' => '5 games'],
                    ['name' => 'Boys HS Rising', 'age' => '(2028, 2029)', 'games' => '5 games'],
                    ['name' => 'Boys Youth', 'age' => '(2030, 2031, 2032, 2033)', 'games' => '5 games'],
                    ['name' => 'Boys 10U', 'age' => '(2034, 2035)', 'games' => '5 games'],
                    ['name' => "MCLA Men's Collegiate", 'age' => '', 'games' => '3 games'],
                    ];
                    @endphp

                    <div class="list-group list-group-flush mb-4">
                        @foreach($divisions as $div)
                        <div class="list-group-item bg-light border mb-2 rounded d-flex justify-content-between align-items-center p-3">
                            <span class="fw-bold">{{ $div['name'] }}</span>
                            <div class="text-end">
                                <div class="small text-muted">{{ $div['age'] }}</div>
                                <span class="badge bg-white text-danger border border-danger rounded-pill">{{ $div['games'] }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-top border-danger pt-3">
                        <h3 class="h5 fw-bold text-center text-danger mb-3">Tournament Pricing</h3>
                        <div class="row g-2 mb-3">
                            @php
                            $prices = [
                            'Boys HS Recruiting' => '$2,750',
                            'Boys HS Rising' => '$2,400',
                            'Boys Youth' => '$2,150',
                            'Boys 10U' => '$1,850',
                            "MCLA Men's Collegiate" => '$1,250',
                            ];
                            @endphp
                            @foreach($prices as $label => $cost)
                            <div class="col-6">
                                <div class="p-3 bg-light border rounded text-center h-100">
                                    <div class="small fw-bold mb-1">{{ $label }}</div>
                                    <div class="h5 text-danger fw-bold mb-0">{{ $cost }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="btn p-3 rounded-10 text-center">
                            <div class="fw-bold">Boys Free Agents</div>
                            <div class="h3 fw-bold mb-0">$150</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5 text-center">
    <div class="d-flex justify-content-center gap-3">
        <a href="https://buku.events/events/golden-gate-games/" target="_blank" class="btn btn-danger px-4 py-3" style="max-width: 380px;">
            Register Here
        </a>
    </div>
</section>

<section class="py-1 bg-white" style="font-family: 'Steelfish Regular', Oswald, HelveticaNeue, 'Helvetica Neue', sans-serif;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-dark fw-bold text-uppercase display-6 mb-4">HOTELS</h2>
                <p class="mb-4 text-muted">
                    Contact Hotel Director Scott Adams to reserve a discounted hotel block
                </p>
                <div class="mb-4">
                    <img src="{{ asset('images/event/theBattleOfTheBay/spoLogo.png') }}" alt="Sports Rooms 4 You Logo" class="img-fluid rounded-3 border p-3 shadow-sm" style="max-width: 200px;">
                    <br>
                    <small class="d-block mt-2 text-dark fw-bold">sportsrooms4you.com</small>
                </div>
                <div class="mb-5">
                    <p class="mb-0 fw-semibold text-dark">Scott Adams</p>
                    <p class="mb-0 text-dark">dscott@sportsrooms4you.com</p>
                    <p class="mb-0 text-dark">408-560-1938</p>
                </div>
                <div>
                    <a href="mailto:dscott@sportsrooms4you.com" class="btn btn-danger btn-lg text-uppercase px-5 py-3 shadow-lg" style="max-width: 380px;">
                        Contact Hotel Agent
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row g-4">
        @php
        $hotels = [
        [
        'title' => 'Marriott Fisherman\'s Wharf',
        'image' => $suncoastImg,
        'desc' => '<strong>San Francisco Marriott Fisherman\'s Wharf-Contact Hotel Director for Pricing</strong> <br> $159+ tax w/discounted $20 nightly destination fee (normally $30)<br><br>1250 Columbus Ave, San Francisco,<br>Two Queen beds<br><br>Pet-friendly<br>Parking available<br>Internet access<br>Restaurant<br>Connecting rooms available<br>Air conditioning<br>Gym<br>Laundry facilities<br>24/7 front desk<br>Non-smoking<br><br>4-star hotel with restaurant, near Lombard Street'
        ],
        [
        'title' => 'HOLIDAY INN GOLDEN GATEWAY',
        'image' => $bestWesternImg,
        'desc' => '<strong>Holiday Inn San Francisco Golden Gateway - Contact Hotel Director for Pricing</strong><br>1500 Van Ness Ave. 94109<br>5 miles from fields<br>Two Double beds<br><br>Family friendly<br>Located on Nob Hill between Fisherman\'s Wharf and the Financial District, modern, stylish hotel delivers a decidedly local experience and remarkable city views and easy access to the city\’s highlights.<br><br>City or Bay Views from Every RoomOutdoor Rooftop PoolMini Fridges in Each Room <br> Free Wi-Fi <br> Locally-Sourced Dining at R.O.H. Restaurant <br> 24-Hour Fitness Center'
        ],
        [
        'title' => 'Rodeway Inn',
        'image' => $rodewayInnImg,
        'desc' => '<b>Contact Hotel Director for Pricing</b><br>1 miles from fields<br>Rodeway Inn San Francisco Great Highway<br><br>FREE PARKING<br>Ocean View Rooms available> Across street from Ocean Beach One Block from<br>Public Transport<br>Lots of local Dining options in walking distance<br>(Parking, Room types, and Views based on availability)'
        ]
        ];
        @endphp

        @foreach($hotels as $index => $hotel)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <h3 class="card-header bg-white border-bottom-0 text-center h5 fw-bold py-3">{{ $hotel['title'] }}</h3>
                <img src="{{ $hotel['image'] }}" class="card-img-top" alt="{{ $hotel['title'] }}" style="height: 220px; object-fit: cover;">
                <div class="card-body p-0">
                    <div class="accordion accordion-flush" id="hotelAccordion{{$index}}">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{$index}}">
                                <button class="accordion-button collapsed bg-light text-dark fw-bold justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$index}}" aria-expanded="false" aria-controls="flush-collapse{{$index}}">
                                    Click for Info
                                </button>
                            </h2>
                            <div id="flush-collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$index}}" data-bs-parent="#hotelAccordion{{$index}}">
                                <div class="accordion-body text-start">
                                    {!! $hotel['desc'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<hr>

<section class="container-fluid px-0 my-5 bg-light py-5">
    <div class="container text-center">
        <div class="col-6 col-md-3">
            <img src="{{ $cirqueImg1 }}" class="img-fluid rounded shadow-sm">
        </div>
    </div>
</section>

<section class="container-fluid px-0 my-5 bg-light py-5">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <img src="{{ $cirqueImg1 }}" alt="2025 Vendor Logos" class="img-fluid my-4">
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/O-OPY06cIio?rel=0&controls=1&showinfo=0" title="Las Vegas Lacrosse Showcase" allowfullscreen></iframe>
    </div>
</section>


<section class="container my-5">
    <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/JH1SpSDFCAE?rel=0&controls=1&showinfo=0" title="Las Vegas Lacrosse Showcase" allowfullscreen></iframe>
    </div>
</section>

<section class="container-fluid px-0 my-5">
    <div class="position-relative text-center text-white d-flex align-items-center justify-content-center py-5"
        style="background-image: url('https://ucarecdn.com/827d0c3b-9edf-449b-8531-d1239970de1e/-/format/auto/-/preview/3000x3000/-/quality/lighter/'); background-size: cover; background-position: center; min-height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50"></div>
        <div class="position-relative z-2 container">
            <h2 class="display-5 fw-bold mb-5 text-danger" style="text-decoration: underline;">Local San Francisco Attractions</h2>
            <div class="row g-3">
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg1 }}" class="img-fluid rounded shadow-sm w-100"></div>
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg2 }}" class="img-fluid rounded shadow-sm w-100"></div>
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg3 }}" class="img-fluid rounded shadow-sm w-100"></div>
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg4 }}" class="img-fluid rounded shadow-sm w-100"></div>
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg5 }}" class="img-fluid rounded shadow-sm w-100"></div>
                <div class="col-6 col-md-4"><img src="{{ $attractionsImg6 }}" class="img-fluid rounded shadow-sm w-100"></div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <ul class="nav nav-tabs justify-content-center mb-4" id="infoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-dark fw-bold" id="sponsors-tab" data-bs-toggle="tab" data-bs-target="#sponsors" type="button" role="tab" aria-controls="sponsors" aria-selected="true">Sponsors</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark fw-bold" id="champions-tab" data-bs-toggle="tab" data-bs-target="#champions" type="button" role="tab" aria-controls="champions" aria-selected="false">Past Champions</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark fw-bold" id="rules-tab" data-bs-toggle="tab" data-bs-target="#rules" type="button" role="tab" aria-controls="rules" aria-selected="false">Tournament Rules</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-dark fw-bold" id="sitemap-tab" data-bs-toggle="tab" data-bs-target="#sitemap" type="button" role="tab" aria-controls="sitemap" aria-selected="false">Site Map</button>
        </li>
    </ul>

    <div class="tab-content" id="infoTabsContent">
        <!-- {{-- Sponsors Tab --}} -->
        <div class="tab-pane fade show active" id="sponsors" role="tabpanel" aria-labelledby="sponsors-tab">
            <h3 class="text-center h5 fw-bold mb-4">Las Vegas Lacrosse Showcase Sponsors & Vendors</h3>
            <div class="row g-4 justify-content-center">
                @php
                $sponsors = [$sponsor1, $sponsor2, $sponsor3, $sponsor4, $sponsor5, $sponsor6, $sponsor7, $sponsor8, $sponsor9, $sponsor10, $sponsor11, $sponsor12];
                @endphp
                @foreach($sponsors as $sp)
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <img src="{{ $sp }}" class="img-fluid" style="max-height: 100px; width: auto;">
                </div>
                @endforeach
            </div>
        </div>

        <!-- {{-- Past Champions Tab (Content omitted in HTML source, implied via images later, putting generic structure) --}} -->
        <div class="tab-pane fade" id="champions" role="tabpanel" aria-labelledby="champions-tab">
            <div class="text-center">
                <p class="text-muted">Content loading...</p>
            </div>
        </div>

        <!-- {{-- Rules Tab --}} -->
        <div class="tab-pane fade" id="rules" role="tabpanel" aria-labelledby="rules-tab">
            <div class="bg-light p-4 rounded">
                <h4 class="fw-bold">Basic Conduct Rules</h4>
                <p>There will be zero tolerance for racist, homophobic, sexist or derogatory language of any kind. There will be no fighting allowed at any time.</p>

                <h4 class="fw-bold mt-3">Game Format</h4>
                <ul class="list-unstyled">
                    <li>No Coin‐Toss or Line‐Up before games.</li>
                    <li>AP determined by winner of first face-off.</li>
                    <li>22 minute running halves / Four minute halftime.</li>
                    <li>Penalties are running time: 45 seconds for a technical foul and 90 seconds for a personal foul.</li>
                    <li>There will be a 3 minute sudden death overtime.</li>
                </ul>

                <h4 class="fw-bold mt-3">Seeding Format</h4>
                <p>Win vs. Loss Record > Head to Head Record > Lowest Goals Against (Overall) > Goal Differential (Overall) > Coin Flip</p>
            </div>
        </div>

        <!-- {{-- Sitemap Tab --}} -->
        <div class="tab-pane fade" id="sitemap" role="tabpanel" aria-labelledby="sitemap-tab">
            <div class="text-center py-5">
                <p class="text-muted">Map details coming soon.</p>
            </div>
        </div>
    </div>
</section>

@endsection
