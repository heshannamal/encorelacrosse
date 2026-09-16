<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top border-bottom">
    <div class="container-fluid px-4 px-lg-5 py-2">

        <a class="navbar-brand me-auto fw-bold fs-2" href="/">
            <img src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Logo" class="d-inline-block align-top" style="max-width: 160px; height: auto;">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" style="font-family: Steelfish Regular;">
            <ul class="navbar-nav ms-auto text-uppercase fs-5 nav-fill">

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu border-0 shadow-sm p-0">
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.mens-tops') }}">Men's Tops</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.womens-tops') }}">Women's Tops</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.hats') }}">Hats</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Teamwear</a>
                    <ul class="dropdown-menu border-0 shadow-sm p-0">
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.allTeamwear') }}">All Teamwear</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.mensGameJerseys') }}">Men's Game Jerseys</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.mensShorts') }}">Men's Shorts</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.mensShooters') }}">Men's Shooters</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.mensReversibles') }}">Men's Reversibles</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.womensRacerbacks') }}">Women's Racerbacks</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.womensShortsKilts') }}">Women's Shorts &amp; Kilts</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.womensShooters') }}">Women's Shooters</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.outerwear') }}">Outerwear</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.hoodies') }}">Hoodies</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.joggersSweats') }}">Joggers &amp; Sweats</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ route('teamwear.lpp') }}">LPP</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Custom</a>
                    <ul class="dropdown-menu border-0 shadow-sm p-0">
                        <li><a class="dropdown-item" href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Events</a>
                    <ul class="dropdown-menu border-0 shadow-sm p-0">
                        <li><a class="dropdown-item" href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown px-2">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">International</a>
                    <ul class="dropdown-menu border-0 shadow-sm p-0">
                        <li><a class="dropdown-item" href="{{ route('international.sriLanka') }}">Sri Lanka</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.philippines') }}">Philippines</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.ecuador') }}">Ecuador</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.uganda') }}">Uganda</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.japan') }}">Japan</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.berlin') }}">Berlin</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.colombia') }}">Colombia</a></li>
                        <li><a class="dropdown-item" href="{{ route('international.trinidadAndTobago') }}">Trinidad &amp; Tobago Lacrosse</a></li>
                    </ul>
                </li>

                <li class="nav-item px-2"><a class="nav-link text-uppercase" href="{{ route('about') }}">About</a></li>
                <li class="nav-item px-2"><a class="nav-link text-uppercase" href="{{ route('privateTraining') }}">Private Training</a></li>
            </ul>
        </div>

        <div class="d-none d-lg-flex align-items-center ms-3">

            <a href="#" class="nav-link text-dark p-2" aria-label="Search">
                <i class="bi bi-search fs-5"></i>
            </a>

            <a href="/account/login" class="nav-link text-dark p-2" aria-label="Account">
                <i class="bi bi-person-circle fs-5"></i>
            </a>

            <a href="/cart" class="nav-link text-dark p-2 position-relative" aria-label="Cart">
                <i class="bi bi-bag fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                    0
                    <span class="visually-hidden">items in cart</span>
                </span>
            </a>
        </div>
    </div>
</nav>