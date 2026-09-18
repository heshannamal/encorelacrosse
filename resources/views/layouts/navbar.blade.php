<header class="encore-site-header">
    <div class="encore-header-desktop">
        <div class="encore-header-logo-col">
            <a href="{{ url('/') }}" class="encore-logo-link" aria-label="Encore Lacrosse home">
                <img src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Lacrosse" class="encore-header-logo">
            </a>
        </div>

        <nav class="encore-header-center" aria-label="Primary navigation">
            <ul class="encore-main-nav">
                <li class="encore-nav-item">
                    <a href="{{ route('allProduct') }}" class="encore-nav-link">Shop</a>

                    {{--
                    Shop category dropdown kept for possible future use.
                    <ul class="encore-dropdown encore-dropdown-shop">
                        <li><a href="{{ route('shop.mens-tops') }}">Men's Tops</a></li>
                        <li><a href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li>
                        <li><a href="{{ route('shop.womens-tops') }}">Women's Tops</a></li>
                        <li><a href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li>
                        <li><a href="{{ route('shop.hats') }}">Hats</a></li>
                        <li><a href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                    --}}
                </li>

                <li class="encore-nav-item has-dropdown">
                    <a href="{{ url('/pages/teamwear') }}" class="encore-nav-link">Teamwear <span class="encore-chevron"></span></a>
                    <ul class="encore-dropdown encore-dropdown-wide">
                        <li><a href="{{ route('teamwear.allTeamwear') }}">All Teamwear</a></li>
                        <li><a href="{{ route('teamwear.mensGameJerseys') }}">Men's Game Jerseys</a></li>
                        <li><a href="{{ route('teamwear.mensShorts') }}">Men's Shorts</a></li>
                        <li><a href="{{ route('teamwear.mensShooters') }}">Men's Shooters</a></li>
                        <li><a href="{{ route('teamwear.mensReversibles') }}">Men's Reversibles</a></li>
                        <li><a href="{{ route('teamwear.womensRacerbacks') }}">Women's Racerbacks</a></li>
                        <li><a href="{{ route('teamwear.womensShortsKilts') }}">Women's Shorts &amp; Kilts</a></li>
                        <li><a href="{{ route('teamwear.womensShooters') }}">Women's Shooters</a></li>
                        <li><a href="{{ route('teamwear.outerwear') }}">Outerwear</a></li>
                        <li><a href="{{ route('teamwear.hoodies') }}">Hoodies</a></li>
                        <li><a href="{{ route('teamwear.joggersSweats') }}">Joggers &amp; Sweats</a></li>
                        <li><a href="{{ route('teamwear.lpp') }}">LPP</a></li>
                    </ul>
                </li>

                <li class="encore-nav-item has-dropdown">
                    <a href="{{ url('/') }}" class="encore-nav-link">Custom <span class="encore-chevron"></span></a>
                    <ul class="encore-dropdown encore-dropdown-wide">
                        <li><a href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="encore-nav-item has-dropdown">
                    <a href="#" class="encore-nav-link">Events <span class="encore-chevron"></span></a>
                    <ul class="encore-dropdown encore-dropdown-wide">
                        <li><a href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li>
                        <li><a href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li>
                        <li><a href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li>
                        <li><a href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li>
                        <li><a href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li>
                        <li><a href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>

                <li class="encore-nav-item has-dropdown">
                    <a href="{{ url('/pages/international') }}" class="encore-nav-link">International <span class="encore-chevron"></span></a>
                    <ul class="encore-dropdown encore-dropdown-wide">
                        <li><a href="{{ route('international.sriLanka') }}">Sri Lanka</a></li>
                        <li><a href="{{ route('international.philippines') }}">Philippines</a></li>
                        <li><a href="{{ route('international.ecuador') }}">Ecuador</a></li>
                        <li><a href="{{ route('international.uganda') }}">Uganda</a></li>
                        <li><a href="{{ route('international.japan') }}">Japan</a></li>
                        <li><a href="{{ route('international.berlin') }}">Berlin</a></li>
                        <li><a href="{{ route('international.colombia') }}">Colombia</a></li>
                        <li><a href="{{ route('international.trinidadAndTobago') }}">Trinidad &amp; Tobago Lacrosse</a></li>
                    </ul>
                </li>

                <li class="encore-nav-item">
                    <a href="{{ route('about') }}" class="encore-nav-link">About</a>
                </li>
            </ul>

            <a href="{{ route('privateTraining') }}" class="encore-private-training">Private Training</a>
        </nav>

        <div class="encore-header-tools" aria-label="Header tools">
            <a href="{{ route('allProduct') }}" class="encore-tool" aria-label="Search products"><i class="bi bi-search"></i></a>
            <a href="{{ route('login') }}" class="encore-tool" aria-label="Account"><i class="bi bi-person"></i></a>
            <a href="{{ route('cart') }}" class="encore-tool encore-cart" aria-label="Cart">
                <i class="bi bi-bag"></i>
                <span class="encore-cart-count" data-encore-cart-count>0</span>
            </a>
        </div>
    </div>

    <div class="encore-header-mobile">
        <a href="{{ url('/') }}" class="encore-mobile-logo-link" aria-label="Encore Lacrosse home">
            <img src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Lacrosse" class="encore-mobile-logo">
        </a>

        <div class="encore-mobile-actions">
            <a href="{{ route('allProduct') }}" aria-label="Search products"><i class="bi bi-search"></i></a>
            <a href="{{ route('cart') }}" class="encore-mobile-cart" aria-label="Cart"><i class="bi bi-bag"></i><span data-encore-cart-count>0</span></a>
            <button class="encore-mobile-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#encoreMobileMenu" aria-controls="encoreMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="collapse encore-mobile-menu" id="encoreMobileMenu">
            <a href="{{ route('allProduct') }}">Shop</a>
            <a href="{{ url('/pages/teamwear') }}">Teamwear</a>
            <a href="{{ url('/') }}">Custom</a>
            <a href="#">Events</a>
            <a href="{{ url('/pages/international') }}">International</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('privateTraining') }}">Private Training</a>
            @if(!empty(session('encore_user_token')) || !empty(session('auth_api_token')))
                <a href="{{ route('profile') }}">My Account</a>
            @else
                <a href="{{ route('login') }}">Account</a>
            @endif
        </div>
    </div>
</header>

<div class="encore-fixed-header-offset" aria-hidden="true"></div>

<style>
    .encore-site-header,
    .encore-site-header * {
        box-sizing: border-box;
    }

    .encore-site-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1100;
        height: 90px;
        background: #fff;
        border-bottom: 1px solid #e6e6e6;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08);
        font-family: 'Oswald', sans-serif;
    }

    .encore-header-desktop {
        width: 100%;
        height: 90px;
        padding: 0 55px;
        display: grid;
        grid-template-columns: 25% 50% 25%;
        align-items: center;
    }

    .encore-header-logo-col {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .encore-logo-link {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .encore-header-logo {
        display: block;
        width: 160px;
        max-width: 160px;
        height: auto;
    }

    .encore-header-center {
        position: relative;
        align-self: stretch;
        min-width: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .encore-main-nav {
        height: 48px;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        list-style: none;
        white-space: nowrap;
    }

    .encore-nav-item {
        position: relative;
        height: 48px;
        display: flex;
        align-items: center;
    }

    .encore-nav-link {
        height: 48px;
        padding: 0 12px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #555;
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
        font-weight: 300;
        line-height: 1;
        text-decoration: none;
        text-transform: uppercase;
        transition: color .15s ease;
    }

    .encore-nav-link:hover,
    .encore-nav-item:hover > .encore-nav-link,
    .encore-nav-item:focus-within > .encore-nav-link {
        color: #b5b5b5;
    }

    .encore-chevron {
        width: 6px;
        height: 6px;
        margin-top: -4px;
        display: inline-block;
        border-right: 1px solid currentColor;
        border-bottom: 1px solid currentColor;
        transform: rotate(45deg);
    }

    .encore-private-training {
        margin-top: 4px;
        color: #5d5d5d;
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
        font-weight: 300;
        line-height: 1;
        text-decoration: none;
        text-transform: uppercase;
        transition: color .15s ease;
    }

    .encore-private-training:hover {
        color: #b5b5b5;
    }

    .encore-dropdown {
        position: absolute;
        top: 43px;
        left: 0;
        z-index: 1200;
        width: 195px;
        margin: 0;
        padding: 9px 0 8px;
        list-style: none;
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 0;
        box-shadow: none;
        opacity: 0;
        visibility: hidden;
        transform: translateY(4px);
        transition: opacity .15s ease, transform .15s ease, visibility .15s ease;
    }

    .encore-dropdown-wide {
        width: 260px;
    }

    .encore-dropdown li {
        margin: 0;
        padding: 0;
    }

    .encore-dropdown a {
        min-height: 45px;
        padding: 0 14px;
        display: flex;
        align-items: center;
        color: #4e4e4e;
        background: #fff;
        font-family: 'Oswald', sans-serif;
        font-size: 22px;
        font-weight: 300;
        line-height: 1.1;
        letter-spacing: 0;
        text-decoration: none;
        text-transform: uppercase;
        white-space: nowrap;
        transition: color .15s ease, background .15s ease;
    }

    .encore-dropdown a:hover,
    .encore-dropdown a:focus {
        color: #111;
        background: #fafafa;
    }

    .encore-nav-item:hover > .encore-dropdown,
    .encore-nav-item:focus-within > .encore-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .encore-header-tools {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 4px;
    }

    .encore-tool {
        position: relative;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #444;
        font-size: 21px;
        text-decoration: none;
    }

    .encore-tool:hover {
        color: #111;
    }

    .encore-cart-count {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 16px;
        height: 16px;
        padding: 0 4px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: #e11920;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 9px;
        font-weight: 700;
        line-height: 1;
    }

    .encore-fixed-header-offset {
        height: 42px;
    }

    .encore-header-mobile {
        display: none;
    }

    @media (max-width: 1199.98px) and (min-width: 992px) {
        .encore-header-desktop {
            padding: 0 28px;
            grid-template-columns: 23% 58% 19%;
        }

        .encore-header-logo {
            width: 145px;
        }

        .encore-nav-link {
            padding-left: 8px;
            padding-right: 8px;
            font-size: 17px;
        }

        .encore-private-training {
            font-size: 17px;
        }
    }

    @media (max-width: 991.98px) {
        .encore-site-header {
            height: 64px;
        }

        .encore-header-desktop {
            display: none;
        }

        .encore-header-mobile {
            position: relative;
            height: 64px;
            padding: 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .encore-mobile-logo {
            display: block;
            width: 118px;
            height: auto;
        }

        .encore-mobile-actions {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .encore-mobile-actions > a {
            position: relative;
            color: #333;
            font-size: 20px;
            text-decoration: none;
        }

        .encore-mobile-cart span {
            position: absolute;
            top: -7px;
            right: -8px;
            width: 15px;
            height: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e11920;
            color: #fff;
            font: 700 8px Arial, sans-serif;
        }

        .encore-mobile-toggle {
            width: 28px;
            height: 28px;
            padding: 4px 0;
            border: 0;
            background: transparent;
        }

        .encore-mobile-toggle span {
            width: 23px;
            height: 1px;
            margin: 4px auto;
            display: block;
            background: #333;
        }

        .encore-mobile-menu {
            position: absolute;
            top: 64px;
            left: 0;
            right: 0;
            padding: 10px 18px 18px;
            background: #fff;
            border-top: 1px solid #eee;
            box-shadow: 0 8px 18px rgba(0,0,0,.08);
        }

        .encore-mobile-menu a {
            padding: 10px 0;
            display: block;
            border-bottom: 1px solid #eee;
            color: #555;
            font-family: 'Oswald', sans-serif;
            font-size: 17px;
            font-weight: 300;
            text-decoration: none;
            text-transform: uppercase;
        }

        .encore-fixed-header-offset {
            height: 16px;
        }
    }
</style>