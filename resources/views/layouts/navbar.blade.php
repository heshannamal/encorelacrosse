<nav class="navbar navbar-expand-lg bg-white fixed-top site-header" aria-label="Primary navigation">
    <div class="container-fluid px-3 px-lg-4">
        <a class="navbar-brand p-0 me-3" href="{{ url('/') }}" aria-label="Encore Lacrosse home">
            <img src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Lacrosse" class="site-logo">
        </a>

        <button class="navbar-toggler border-0 shadow-none p-1" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto align-items-lg-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('shop.mens-tops') }}">Men's Tops</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.womens-tops') }}">Women's Tops</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.hats') }}">Hats</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Teamwear</a>
                    <ul class="dropdown-menu border-0 shadow-sm">
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
                    <ul class="dropdown-menu border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a class="dropdown-item" href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Events</a>
                    <ul class="dropdown-menu border-0 shadow-sm">
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
                    <ul class="dropdown-menu border-0 shadow-sm">
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

                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
            </ul>

            <div class="header-tools d-flex align-items-center justify-content-center justify-content-lg-end mt-2 mt-lg-0">
                <a href="#" class="header-tool" aria-label="Search"><i class="bi bi-search"></i></a>
                <a href="#" class="header-tool" aria-label="Account"><i class="bi bi-person"></i></a>
                <a href="#" class="header-tool position-relative" aria-label="Cart">
                    <i class="bi bi-bag"></i>
                    <span class="cart-dot" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .site-header {
        min-height: 62px;
        padding: 0;
        border-bottom: 1px solid rgba(0,0,0,.08);
        box-shadow: 0 1px 4px rgba(0,0,0,.04);
        z-index: 1040;
    }

    .site-header .site-logo {
        width: 108px;
        height: auto;
        display: block;
    }

    .site-header .navbar-nav { gap: 2px; }

    .site-header .nav-link {
        color: #333;
        padding: 21px 11px 20px;
        font-size: 11px;
        font-weight: 400;
        line-height: 1;
        letter-spacing: .035em;
        white-space: nowrap;
    }

    .site-header .nav-link:hover,
    .site-header .nav-link:focus,
    .site-header .nav-link.show { color: #c40000; }

    .site-header .dropdown-toggle::after {
        margin-left: .32rem;
        vertical-align: .16em;
        border-width: .25em .25em 0;
    }

    .site-header .dropdown-menu {
        min-width: 210px;
        margin-top: 0;
        padding: 8px 0;
        border-radius: 0;
    }

    .site-header .dropdown-item {
        padding: 8px 16px;
        color: #3d3d3d;
        font-family: 'Oswald', 'Arial Narrow', Arial, sans-serif;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .025em;
    }

    .site-header .dropdown-item:hover,
    .site-header .dropdown-item:focus {
        color: #c40000;
        background: #f7f7f7;
    }

    .header-tools { gap: 2px; }

    .header-tool {
        width: 31px;
        height: 31px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #333;
        text-decoration: none;
        font-size: 14px;
    }

    .header-tool:hover { color: #c40000; }

    .cart-dot {
        position: absolute;
        top: 4px;
        right: 2px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #c40000;
    }

    @media (min-width: 992px) {
        .site-header .dropdown:hover > .dropdown-menu { display: block; }
    }

    @media (max-width: 991.98px) {
        .site-header { min-height: 58px; }
        .site-header .site-logo { width: 102px; }
        .site-header .navbar-collapse {
            margin: 8px -12px 0;
            padding: 8px 16px 15px;
            background: #fff;
            border-top: 1px solid #eee;
            max-height: calc(100vh - 58px);
            overflow-y: auto;
        }
        .site-header .nav-link { padding: 10px 4px; font-size: 12px; }
        .site-header .dropdown-menu { box-shadow: none !important; padding: 0 0 6px 10px; }
        .header-tools { border-top: 1px solid #eee; padding-top: 8px; }
    }
</style>
