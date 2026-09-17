<nav class="navbar navbar-expand-lg bg-white fixed-top site-header" aria-label="Primary navigation">
    <div class="container-fluid site-header-inner">
        <a class="navbar-brand p-0" href="{{ url('/') }}" aria-label="Encore Lacrosse home">
            <img src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Lacrosse" class="site-logo">
        </a>

        <button class="navbar-toggler p-1" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto align-items-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('shop.mens-tops') }}">Men's Tops</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.womens-tops') }}">Women's Tops</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.hats') }}">Hats</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('teamwear.allTeamwear') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Teamwear</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('teamwear.allTeamwear') }}">All Teamwear</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.mensGameJerseys') }}">Men's Game Jerseys</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.mensShorts') }}">Men's Shorts</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.mensShooters') }}">Men's Shooters</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.mensReversibles') }}">Men's Reversibles</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.womensRacerbacks') }}">Women's Racerbacks</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.womensShortsKilts') }}">Women's Shorts &amp; Kilts</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.womensShooters') }}">Women's Shooters</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.outerwear') }}">Outerwear</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.hoodies') }}">Hoodies</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.joggersSweats') }}">Joggers &amp; Sweats</a></li>
                        <li><a class="dropdown-item" href="{{ route('teamwear.lpp') }}">LPP</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Custom</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Events</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">International</a>
                    <ul class="dropdown-menu">
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

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>

                <li class="nav-item private-training-nav">
                    <a class="nav-link" href="{{ route('privateTraining') }}">Private Training</a>
                </li>
            </ul>

            <div class="header-tools d-flex align-items-center justify-content-center justify-content-lg-end">
                <a href="#" class="header-tool" aria-label="Search"><i class="bi bi-search"></i></a>
                <a href="#" class="header-tool" aria-label="Account"><i class="bi bi-person"></i></a>
                <a href="#" class="header-tool" aria-label="Cart">
                    <i class="bi bi-bag"></i>
                    <span class="cart-count" aria-label="0 items in cart">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>
