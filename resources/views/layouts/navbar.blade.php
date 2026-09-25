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
                    <ul class="encore-dropdown encore-dropdown-wide encore-dropdown-events">
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
            <a href="{{ route('allProduct') }}" aria-label="Search products"><i class="bi bi-search" aria-hidden="true"></i></a>
            <a href="{{ route('cart') }}" class="encore-mobile-cart" aria-label="Cart">
                <i class="bi bi-bag" aria-hidden="true"></i><span data-encore-cart-count>0</span>
            </a>
            <button class="encore-mobile-toggle" type="button" id="encoreMobileToggle"
                aria-controls="encoreMobileMenu" aria-expanded="false" aria-label="Open navigation menu">
                <span></span><span></span><span></span>
            </button>
        </div>

        <div class="encore-mobile-backdrop" id="encoreMobileBackdrop" hidden></div>

        <nav class="encore-mobile-menu" id="encoreMobileMenu" aria-label="Mobile navigation" hidden>
            <ul class="encore-mobile-nav-list">
                <li class="encore-mobile-nav-item">
                    <a class="encore-mobile-nav-link" href="{{ route('allProduct') }}">Shop</a>
                </li>

                <li class="encore-mobile-nav-item">
                    <div class="encore-mobile-nav-row">
                        <a class="encore-mobile-nav-link" href="{{ url('/pages/teamwear') }}">Teamwear</a>
                        <button class="encore-mobile-subtoggle" type="button" aria-label="Show Teamwear links"
                            aria-expanded="false" aria-controls="encoreMobileTeamwear">
                            <span class="encore-mobile-chevron" aria-hidden="true"></span>
                        </button>
                    </div>
                    <ul class="encore-mobile-submenu" id="encoreMobileTeamwear" hidden>
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

                <li class="encore-mobile-nav-item">
                    <button class="encore-mobile-nav-link encore-mobile-nav-parent" type="button"
                        aria-expanded="false" aria-controls="encoreMobileCustom">
                        Custom <span class="encore-mobile-chevron" aria-hidden="true"></span>
                    </button>
                    <ul class="encore-mobile-submenu" id="encoreMobileCustom" hidden>
                        <li><a href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="encore-mobile-nav-item">
                    <button class="encore-mobile-nav-link encore-mobile-nav-parent" type="button"
                        aria-expanded="false" aria-controls="encoreMobileEvents">
                        Events <span class="encore-mobile-chevron" aria-hidden="true"></span>
                    </button>
                    <ul class="encore-mobile-submenu" id="encoreMobileEvents" hidden>
                        <li><a href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li>
                        <li><a href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li>
                        <li><a href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li>
                        <li><a href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li>
                        <li><a href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li>
                        <li><a href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>

                <li class="encore-mobile-nav-item">
                    <div class="encore-mobile-nav-row">
                        <a class="encore-mobile-nav-link" href="{{ url('/pages/international') }}">International</a>
                        <button class="encore-mobile-subtoggle" type="button" aria-label="Show International links"
                            aria-expanded="false" aria-controls="encoreMobileInternational">
                            <span class="encore-mobile-chevron" aria-hidden="true"></span>
                        </button>
                    </div>
                    <ul class="encore-mobile-submenu" id="encoreMobileInternational" hidden>
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

                <li class="encore-mobile-nav-item">
                    <a class="encore-mobile-nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="encore-mobile-nav-item">
                    <a class="encore-mobile-nav-link" href="{{ route('privateTraining') }}">Private Training</a>
                </li>
                <li class="encore-mobile-nav-item">
                    @if(!empty(session('encore_user_token')) || !empty(session('auth_api_token')))
                        <a class="encore-mobile-nav-link" href="{{ route('profile') }}">My Account</a>
                    @else
                        <a class="encore-mobile-nav-link" href="{{ route('login') }}">Account / Login</a>
                    @endif
                </li>
            </ul>
        </nav>
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
        height: 76px;
        background: #fff;
        border-bottom: 1px solid #e6e6e6;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08);
        font-family: 'Oswald', sans-serif;
    }

    .encore-header-desktop {
        width: 100%;
        height: 76px;
        padding: 0 28px;
        display: grid;
        grid-template-columns: minmax(160px, 1fr) max-content minmax(120px, 1fr);
        column-gap: 12px;
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
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 6px;
        white-space: nowrap;
    }

    .encore-main-nav {
        height: 48px;
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: nowrap;
        flex-shrink: 0;
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
        padding: 0 8px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #555;
        font-family: 'Oswald', sans-serif;
        font-size: 18px;
        font-weight: 300;
        line-height: 1;
        white-space: nowrap;
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
        display: inline-flex;
        align-items: center;
        flex-shrink: 0;
        height: 48px;
        margin: 0 0 0 8px;
        white-space: nowrap;
        color: #5d5d5d;
        font-family: 'Oswald', sans-serif;
        font-size: 18px;
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
        width: max-content;
        min-width: 260px;
        max-width: min(360px, calc(100vw - 32px));
    }

    .encore-dropdown-events {
        min-width: 325px;
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
        overflow: hidden;
        text-overflow: ellipsis;
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
        height: 28px;
    }

    .encore-header-mobile {
        display: none;
    }

    @media (max-width: 1199.98px) and (min-width: 992px) {
        .encore-header-desktop {
            padding: 0 18px;
            grid-template-columns: minmax(135px, 1fr) max-content minmax(112px, 1fr);
            column-gap: 7px;
        }

        .encore-header-logo {
            width: 135px;
        }

        .encore-header-center {
            gap: 2px;
        }

        .encore-nav-link {
            padding-left: 5px;
            padding-right: 5px;
            gap: 5px;
            font-size: 16px;
        }

        .encore-private-training {
            margin-left: 5px;
            font-size: 16px;
        }

        .encore-tool {
            width: 36px;
        }

        .encore-dropdown-wide {
            min-width: 250px;
            max-width: min(330px, calc(100vw - 24px));
        }

        .encore-dropdown-events {
            min-width: 305px;
        }

        .encore-dropdown a {
            font-size: 19px;
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
            width: 100%;
            height: 64px;
            padding: 0 clamp(12px, 4vw, 22px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .encore-mobile-logo-link {
            display: inline-flex;
            align-items: center;
            flex: 0 1 140px;
            min-width: 0;
        }

        .encore-mobile-logo {
            display: block;
            width: min(128px, 100%);
            height: auto;
        }

        .encore-mobile-actions {
            display: flex;
            flex: 0 0 auto;
            align-items: center;
            gap: clamp(3px, 1.7vw, 11px);
        }

        .encore-mobile-actions > a,
        .encore-mobile-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 44px;
            flex: 0 0 auto;
            color: #333;
            font-size: 21px;
            text-decoration: none;
            -webkit-tap-highlight-color: transparent;
        }

        .encore-mobile-actions > a {
            position: relative;
        }

        .encore-mobile-cart span {
            position: absolute;
            top: 1px;
            right: 1px;
            min-width: 15px;
            height: 15px;
            padding: 0 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e11920;
            color: #fff;
            font: 700 8px Arial, sans-serif;
        }

        .encore-mobile-toggle {
            flex-direction: column;
            gap: 5px;
            padding: 0;
            border: 0;
            background: transparent;
            cursor: pointer;
        }

        .encore-mobile-toggle span {
            width: 23px;
            height: 1.5px;
            display: block;
            background: currentColor;
            transition: transform .2s ease, opacity .2s ease;
        }

        .encore-mobile-toggle[aria-expanded="true"] span:first-child {
            transform: translateY(6.5px) rotate(45deg);
        }

        .encore-mobile-toggle[aria-expanded="true"] span:nth-child(2) {
            opacity: 0;
        }

        .encore-mobile-toggle[aria-expanded="true"] span:last-child {
            transform: translateY(-6.5px) rotate(-45deg);
        }

        .encore-mobile-backdrop {
            position: fixed;
            inset: 64px 0 0;
            z-index: 1100;
            background: rgba(16, 16, 16, .45);
        }

        .encore-mobile-menu {
            position: fixed;
            top: 64px;
            right: 0;
            z-index: 1101;
            width: min(400px, 100vw);
            height: calc(100vh - 64px);
            height: calc(100dvh - 64px);
            overflow-y: auto;
            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;
            padding: 12px 20px max(28px, env(safe-area-inset-bottom));
            background: #fff;
            box-shadow: -10px 12px 35px rgba(0,0,0,.12);
        }

        .encore-mobile-menu[hidden],
        .encore-mobile-backdrop[hidden],
        .encore-mobile-submenu[hidden] {
            display: none !important;
        }

        .encore-mobile-nav-list,
        .encore-mobile-submenu {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .encore-mobile-nav-item {
            border-bottom: 1px solid #ececec;
        }

        .encore-mobile-nav-row {
            display: flex;
            align-items: stretch;
        }

        .encore-mobile-nav-link {
            display: flex;
            flex: 1 1 auto;
            min-height: 53px;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            width: 100%;
            margin: 0;
            padding: 12px 6px;
            border: 0;
            background: transparent;
            color: #4a4a4a;
            font-family: 'Oswald', sans-serif;
            font-size: 17px;
            font-weight: 400;
            line-height: 1.35;
            text-align: left;
            text-decoration: none;
            text-transform: uppercase;
            white-space: normal;
        }

        .encore-mobile-nav-parent {
            cursor: pointer;
        }

        .encore-mobile-subtoggle {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 46px;
            min-width: 46px;
            border: 0;
            border-left: 1px solid #f0f0f0;
            background: transparent;
            color: #555;
            cursor: pointer;
        }

        .encore-mobile-chevron {
            display: inline-block;
            flex: 0 0 9px;
            width: 9px;
            height: 9px;
            border-right: 1.5px solid currentColor;
            border-bottom: 1.5px solid currentColor;
            transform: rotate(45deg) translateY(-2px);
            transition: transform .2s ease;
        }

        [aria-expanded="true"] > .encore-mobile-chevron {
            transform: rotate(225deg) translate(-2px, -1px);
        }

        .encore-mobile-submenu {
            padding: 3px 0 12px 15px;
            border-top: 1px solid #f2f2f2;
            background: #fafafa;
        }

        .encore-mobile-submenu a {
            display: flex;
            align-items: center;
            min-height: 43px;
            padding: 9px 9px;
            color: #555;
            font-family: 'Oswald', sans-serif;
            font-size: 15px;
            font-weight: 300;
            line-height: 1.3;
            text-decoration: none;
            text-transform: uppercase;
            white-space: normal;
            overflow-wrap: anywhere;
        }

        .encore-mobile-submenu li + li {
            border-top: 1px solid #ededed;
        }

        .encore-mobile-nav-link:hover,
        .encore-mobile-submenu a:hover {
            color: #d71920;
        }

        .encore-mobile-actions :focus-visible,
        .encore-mobile-menu :focus-visible {
            outline: 2px solid #d71920;
            outline-offset: -2px;
        }

        .encore-fixed-header-offset {
            height: 16px;
        }
    }

    @media (max-width: 359.98px) {
        .encore-header-mobile {
            gap: 6px;
            padding-inline: 10px;
        }

        .encore-mobile-logo {
            width: min(105px, 100%);
        }

        .encore-mobile-actions > a,
        .encore-mobile-toggle {
            width: 35px;
        }

        .encore-mobile-menu {
            padding-inline: 15px;
        }
    }

    @media (min-width: 992px) {
        .encore-mobile-backdrop,
        .encore-mobile-menu {
            display: none !important;
        }
    }
</style>

<script>
(function () {
    function initEncoreMobileNavigation() {
        var toggle = document.getElementById('encoreMobileToggle');
        var menu = document.getElementById('encoreMobileMenu');
        var backdrop = document.getElementById('encoreMobileBackdrop');
        if (!toggle || !menu || !backdrop) return;

        var parentButtons = Array.from(menu.querySelectorAll('[aria-controls].encore-mobile-subtoggle, [aria-controls].encore-mobile-nav-parent'));

        function closeSubmenus() {
            parentButtons.forEach(function (button) {
                button.setAttribute('aria-expanded', 'false');
                var panel = document.getElementById(button.getAttribute('aria-controls'));
                if (panel) panel.hidden = true;
            });
        }

        function setOpen(open, restoreFocus) {
            toggle.setAttribute('aria-expanded', String(open));
            toggle.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
            menu.hidden = !open;
            backdrop.hidden = !open;
            document.body.classList.toggle('encore-mobile-menu-open', open);
            if (!open) {
                closeSubmenus();
                if (restoreFocus) toggle.focus();
            }
        }

        toggle.addEventListener('click', function () {
            setOpen(menu.hidden);
        });

        backdrop.addEventListener('click', function () {
            setOpen(false, true);
        });

        parentButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var panel = document.getElementById(button.getAttribute('aria-controls'));
                if (!panel) return;
                var shouldOpen = panel.hidden;
                closeSubmenus();
                if (shouldOpen) {
                    button.setAttribute('aria-expanded', 'true');
                    panel.hidden = false;
                }
            });
        });

        menu.addEventListener('click', function (event) {
            if (event.target.closest('a[href]')) setOpen(false);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !menu.hidden) setOpen(false, true);
        });

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 992 && !menu.hidden) setOpen(false);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initEncoreMobileNavigation);
    } else {
        initEncoreMobileNavigation();
    }
})();
</script>
<style>
    @media (max-width: 991.98px) {
        body.encore-mobile-menu-open { overflow: hidden; }
    }
</style>