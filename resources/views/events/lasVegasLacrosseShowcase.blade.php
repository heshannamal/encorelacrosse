@extends('layouts.app')

@section('content')

@php
// --- Hero & Logos ---
$heroBgImage = asset('images/event/lasVegasLacrosseShowcase/backgroundImage.jpg');
$eventLogo = asset('images/event/lasVegasLacrosseShowcase/backgroundImageLogo.png');
$vegasRoomsLogo = asset('images/event/lasVegasLacrosseShowcase/vegasLogo.png');

// --- Hotels ---
$suncoastImg = asset('images/event/lasVegasLacrosseShowcase/image1.avif');
$bestWesternImg = asset('images/event/lasVegasLacrosseShowcase/image2.jpg');
$hamptonSummerlinImg = asset('images/event/lasVegasLacrosseShowcase/image3.jpg');
$jwMarriottImg = asset('images/event/lasVegasLacrosseShowcase/image4.jpg');
$laQuintaImg = asset('images/event/lasVegasLacrosseShowcase/image5.jpg');
$hamptonTropicanaImg = asset('images/event/lasVegasLacrosseShowcase/image6.jpg');

// --- Cirque du Soleil ---
$cirqueImg1 = 'https://ucarecdn.com/1ddbddd1-4e29-42d3-9f70-7713d2567da4/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$cirqueImg2 = 'https://ucarecdn.com/15d5eb6e-f77f-4071-a9ab-208b01bd2946/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$cirqueImg3 = 'https://ucarecdn.com/7244b78d-3a6d-46d7-bf43-5ad48b8ee86b/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$cirqueImg4 = 'https://ucarecdn.com/f283e0fc-e4ff-4ef4-91e1-3751f16b8deb/-/format/auto/-/preview/3000x3000/-/quality/lighter/';

// --- Extras ---
$photoImg = 'https://ucarecdn.com/2f98d829-706d-4b02-946b-312ce2c12c00/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$diningImg = 'https://ucarecdn.com/f4b4b84e-881a-4b08-83c1-796cc434b64a/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg1 = 'https://ucarecdn.com/7952a89b-5e09-4fef-a929-56e64436f882/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg2 = 'https://ucarecdn.com/d732b3a4-3741-4700-ae10-6a2db956ffd0/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg3 = 'https://ucarecdn.com/07f59c4d-e7ae-4383-886d-a8c0b4f766ef/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg4 = 'https://ucarecdn.com/c6264014-9ab7-4d94-8755-f269138627e3/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg5 = 'https://ucarecdn.com/aef2d477-75ec-4610-ab55-646fe3e3c652/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$attractionsImg6 = 'https://ucarecdn.com/9b6fc768-b076-420e-8283-70598141c3d7/-/format/auto/-/preview/3000x3000/-/quality/lighter/';
$gameFilmImg = asset('images/event/lasVegasLacrosseShowcase/gameFilmImg.png');

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
        <img src="{{ $eventLogo }}" alt="Las Vegas Showcase Logo" class="img-fluid mb-4" style="max-width: 300px;">
        <h1 class="display-4 fw-bold text-uppercase">November 1 - 2, 2025</h1>
    </div>
</section>

<!-- {{-- Event Details & Pricing --}} -->
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6 text-uppercase text-danger">Event Details</h2>
        <p class="lead text-muted">Las Vegas, Nevada</p>
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
                        <div class="fw-bold text-danger h5">Kellogg Zaher Sports Complex</div>
                        <p class="mb-0 text-muted">7901 W. Washington Ave<br>Las Vegas, NV 89128</p>
                    </div>
                    <div class="ratio ratio-16x9 rounded overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3220.410276042691!2d-115.27169292418986!3d36.1809026724301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c06bef3f15fb%3A0xea7339afff0a5809!2sKellogg%20Zaher%20Sports%20Complex!5e0!3m2!1sen!2slk!4v1756030495285!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="bg-danger text-white p-3 rounded text-center mt-3 shadow-sm">
                        <div class="h5 mb-1">Team Tournament Dates</div>
                        <div class="fw-bold h4">Saturday/Sunday, November 1st - 2nd</div>
                    </div>
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
                        <div class="bg-danger text-white p-3 rounded text-center">
                            <div class="fw-bold">Boys Free Agents</div>
                            <div class="h3 fw-bold mb-0">$150</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- {{-- Contact & Buttons --}} -->
<section class="container my-5 text-center">
    <div class="mb-4">
        <p class="lead mb-1 fw-bold">Tournament Contact:</p>
        <p class="mb-1"><a href="mailto:email@LasVegasLacrosseShowcase.com" class="text-decoration-none">email@LasVegasLacrosseShowcase.com</a></p>
        <p>888-501-4999</p>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <a href="https://buku.events/events/boys-vegas-showcase/" target="_blank" class="btn btn-danger px-4 py-3">
            Register Here For Friday Showcase
        </a>
        <a href="https://buku.events/events/las-vegas-lacrosse-showcase/" target="_blank" class="btn btn-danger px-4 py-3">
            Register Here for Tournament
        </a>
    </div>
</section>

<hr class="container my-5 text-muted">

<!-- {{-- Hotels Section --}} -->
<section class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold mb-3">Hotels</h2>
        <p class="text-uppercase fw-bold text-muted">Reserve Your Discounted Hotel Block Here</p>
        <a href="http://vegasrooms4you.com" target="_blank" class="d-inline-block mb-4">
            <img src="{{ $vegasRoomsLogo }}" alt="Vegas Rooms Logo" class="img-fluid" style="max-width: 200px;">
        </a>

        <div class="card bg-light border-0 mx-auto" style="max-width: 380px;">
            <div class="card-body text-start text-center">
                <p class="fw-bold mb-1">Scott Adams</p>
                <p class="mb-1"><a href="mailto:vegasrooms4you@gmail.com" class="text-decoration-none text-dark fw-bold">vegasrooms4you@gmail.com</a></p>
                <p class="fw-bold mb-3">480-560-1938</p>
                <div class="text-center">
                    <a href="mailto:vegasrooms4you@gmail.com" class="btn btn-danger btn-outline-dark px-4 text-white">Contact Hotel Agent</a>
                </div>
            </div>
        </div>
    </div>

    <!-- {{-- Hotel Grid --}} -->
    <div class="row g-4">
        @php
        $hotels = [
        [
        'title' => 'Suncoast',
        'image' => $suncoastImg,
        'desc' => '<strong>SUNCOAST DELUXE RATES:</strong><br>Contact Hotel Admin For Prices<br><br><strong>SUNCOAST GOLF COURSE VIEW DELUXE ROOM RATES:</strong><br>Contact Hotel Admin For Prices<br><br>- *Wifi included<br>- Minifridge<br>- 12 Screen Theatre<br>- Bowling, Arcade<br>- 10+ Dining Establishments<br>- Free Parking, Gift/Grab Shop<br>- Resort Pool & Spa<br>- Fitness & Biz center<br>- Shuttle Options<br>- 1 King or 2 Queens'
        ],
        [
        'title' => 'Best Western Plus',
        'image' => $bestWesternImg,
        'desc' => '<strong>Best western Plus Las Vegas West Rates:</strong><br>Contact Hotel Admin For Prices<br>(Early Check in Available $20)<br><br>- Comp breakfast<br>- Comp wifi<br>- Mini Fridge/Microwave<br>- Pet Friendly<br>- Indoor Pool/Hot Tub<br>- Fitness Center/Biz Center<br>- Free Parking<br>- Laundry Center<br>- 2 Queens'
        ],
        [
        'title' => 'Hampton Inn',
        'image' => $hamptonSummerlinImg,
        'desc' => '<b>Hampton Inn Las Vegas/Summerlin</b><br>Contact Hotel Admin For Prices<br>(2 night Minimum)<br><br>- Comp Breakfast<br>- Comp internet<br>- Microwave/MiniFridge<br>- Fitness & Biz center<br>- Outdoor Pool<br>- Pet Friendly / Area shuttle<br>- 2 Queens/ 2 Queen Suite w/sofabed'
        ],
        [
        'title' => 'JW Marriott',
        'image' => $jwMarriottImg,
        'desc' => '<b>JW Marriott Las Vegas/Summerlin</b><br>Contact Hotel Admin For Prices<br><br>- *Internet/Fridge/Micro<br>- 4+ Dining establishments<br>- Free parking/Valet parking<br>- Spa Aquae 20% Discount*<br>- Biz center & Rec area access<br>- 1 Round Angel Park Putting<br>- 1 Hour bike rental<br>- $10 Slot play & 2 Well Drinks<br>- 2 Electronic Bingo packs<br><br>- 2 Queens'
        ],
        [
        'title' => 'La Quinta Inn',
        'image' => $laQuintaImg,
        'desc' => '<strong>La Quinta Inn Summerlin Rates:</strong><br>Contact Hotel Admin For Prices<br>(Early Check in Available $20)<br><br>- Comp breakfast<br>- Comp wifi<br>- Mini Fridge/Microwave<br>- Pet Friendly<br>- Indoor Pool/Hot Tub<br>- Fitness Center/Biz Center<br>- Free Parking<br>- Laundry Center<br>- 2 Queens'
        ],
        [
        'title' => 'Hampton Inn Tropicana',
        'image' => $hamptonTropicanaImg,
        'desc' => '<strong>ROOM RATES:</strong><br>Contact Hotel Admin For Prices<br><br><strong>Tropicana / Las Vegas</strong><br>- Comp Breakfast<br>- Comp internet<br>- Microwave/MiniFridge<br>- Fitness & Biz center<br>- EV Charging<br>- Outdoor Pool / Waterfall / Outdoor Firepit<br>- Pet Friendly<br>- Connecting rooms available<br>- $15 Discounted per day automobile self parking<br>- Complimentary Bus parking<br><br>- 2 Queens'
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

<!-- {{-- Cirque du Soleil --}} -->
<section class="container-fluid px-0 my-5 bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-2">CIRQUE DU SOLEIL</h2>
        <p class="fw-bold mb-4">RESERVE YOUR TEAM TICKETS FOR A CIRQUE SHOW!</p>
        <p class="mb-4 mx-auto" style="max-width: 800px;">
            The Las Vegas Lacrosse Showcase is proud to partner with Cirque du Soleil Entertainment to help you treat your team to infectious folly and unquenchable smiles witnessing our world renowned team of athletes, acrobats, and dancers; or three bald dudes in blue paint. Cirque du Soleil and Blue Man Group shows are the perfect way to create unique and unforgettable team experiences.
        </p>

        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3"><img src="{{ $cirqueImg1 }}" class="img-fluid rounded shadow-sm"></div>
            <div class="col-6 col-md-3"><img src="{{ $cirqueImg2 }}" class="img-fluid rounded shadow-sm"></div>
            <div class="col-6 col-md-3"><img src="{{ $cirqueImg3 }}" class="img-fluid rounded shadow-sm"></div>
            <div class="col-6 col-md-3"><img src="{{ $cirqueImg4 }}" class="img-fluid rounded shadow-sm"></div>
        </div>

        <div class="bg-white p-4 rounded shadow-sm d-inline-block text-start">
            <p class="mb-1 fw-bold">To reserve discounted group rates, contact:</p>
            <p class="mb-0">CHRIS BARLEY</p>
            <p class="mb-0"><a href="mailto:Chris.Barley@cirquedusoleil.com">Chris.Barley@cirquedusoleil.com</a></p>
            <p class="mb-0 text-muted small">Mention: ENCORE LACROSSE</p>
        </div>
    </div>
</section>

<!-- {{-- Photography & Dining --}} -->
<section class="container my-5 bg-light ">
    <div class="row g-4">
        <div class="col-md-6 text-center">
            <h2 class="h4 fw-bold mb-3 text-uppercase">Action Photography</h2>
            <img src="{{ $photoImg }}" class="img-fluid rounded shadow-sm w-100">
        </div>
        <div class="col-md-6 text-center">
            <h2 class="h4 fw-bold mb-3 text-uppercase">Team Dining</h2>
            <a href="https://www.bucadibeppo.com/tour-groups/?utm_source=encore&utm_medium=lax&utm_campaign=lvshowcase&utm_content=web" target="_blank">
                <img src="{{ $diningImg }}" class="img-fluid rounded shadow-sm w-100">
            </a>
        </div>
    </div>
</section>

<!-- {{-- Local Attractions --}} -->
<section class="container-fluid px-0 my-5">
    <div class="position-relative text-center text-white d-flex align-items-center justify-content-center py-5"
        style="background-image: url('https://ucarecdn.com/827d0c3b-9edf-449b-8531-d1239970de1e/-/format/auto/-/preview/3000x3000/-/quality/lighter/'); background-size: cover; background-position: center; min-height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-50"></div>
        <div class="position-relative z-2 container">
            <h2 class="display-5 fw-bold mb-5 text-danger" style="text-decoration: underline;">Local Las Vegas Attractions</h2>

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

<!-- {{-- Game Film --}} -->
<section class="container my-5 text-center">
    <h2 class="fw-bold mb-4 text-uppercase">Las Vegas Showcase GAME FILM!</h2>
    <hr class="w-50 mx-auto mb-4">
    <a href="https://bigeyevideos.com/learnmore/" target="_blank">
        <img src="{{ $gameFilmImg }}" class="img-fluid mb-3" style="max-height: 100px;">
    </a>
    <p class="lead fw-bold mb-1"><a href="https://bigeyevideos.com/learnmore/" target="_blank" class="text-dark text-decoration-none">Big Eye Videos</a></p>
    <div class="mt-3">
        <p class="mb-0 fw-bold">SCOTT MAYO</p>
        <p class="mb-0">925.321.6532</p>
        <p class="mb-0">Scott@BigEyeVideos.com</p>
    </div>
    <hr class="w-50 mx-auto mt-4">
</section>

<!-- {{-- Sponsors & Info Tabs --}} -->
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

<!-- {{-- Video Embed --}} -->
<section class="container my-5">
    <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/At1XWf5eS38?rel=0&controls=1&showinfo=0" title="Las Vegas Lacrosse Showcase" allowfullscreen></iframe>
    </div>
</section>

@endsection