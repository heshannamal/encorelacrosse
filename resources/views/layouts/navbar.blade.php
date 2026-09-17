<header class="site-header" role="banner">
    <div class="site-header-inner">
        <a class="site-brand" href="{{ url('/') }}" aria-label="Encore Lacrosse home">
            <img class="site-logo" src="{{ asset('images/Encore_Logo.png') }}" alt="Encore Lacrosse">
        </a>

        <nav class="site-nav-wrap" aria-label="Primary navigation">
            <ul class="site-nav-main">
                <li class="site-nav-item">
                    <a class="site-nav-link" href="{{ route('shop.mens-tops') }}">Shop <span class="site-nav-caret" aria-hidden="true"></span></a>
                    <ul class="site-dropdown">
                        <li><a href="{{ route('shop.mens-tops') }}">Men's Tops</a></li>
                        <li><a href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li>
                        <li><a href="{{ route('shop.womens-tops') }}">Women's Tops</a></li>
                        <li><a href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li>
                        <li><a href="{{ route('shop.hats') }}">Hats</a></li>
                        <li><a href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                </li>

                <li class="site-nav-item">
                    <a class="site-nav-link" href="{{ route('teamwear.allTeamwear') }}">Teamwear <span class="site-nav-caret" aria-hidden="true"></span></a>
                    <ul class="site-dropdown">
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

                <li class="site-nav-item">
                    <a class="site-nav-link" href="{{ route('custom.customGraphicDesign') }}">Custom <span class="site-nav-caret" aria-hidden="true"></span></a>
                    <ul class="site-dropdown">
                        <li><a href="{{ route('custom.teamStores') }}">Team Stores</a></li>
                        <li><a href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li>
                        <li><a href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li>
                        <li><a href="{{ route('custom.fabric') }}">Fabric</a></li>
                        <li><a href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>

                <li class="site-nav-item">
                    <a class="site-nav-link" href="{{ route('events.battleOfTheBay') }}">Events <span class="site-nav-caret" aria-hidden="true"></span></a>
                    <ul class="site-dropdown">
                        <li><a href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li>
                        <li><a href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li>
                        <li><a href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li>
                        <li><a href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li>
                        <li><a href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li>
                        <li><a href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>

                <li class="site-nav-item">
                    <a class="site-nav-link" href="{{ route('international.sriLanka') }}">International <span class="site-nav-caret" aria-hidden="true"></span></a>
                    <ul class="site-dropdown">
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

                <li><a class="site-nav-link" href="{{ route('about') }}">About</a></li>
            </ul>

            <a class="site-nav-training" href="{{ route('privateTraining') }}">Private Training</a>
        </nav>

        <div class="site-header-tools" aria-label="Header tools">
            <a class="site-tool" href="#" aria-label="Search"><i class="bi bi-search"></i></a>
            <a class="site-tool" href="#" aria-label="Account"><i class="bi bi-person"></i></a>
            <a class="site-tool" href="#" aria-label="Cart">
                <i class="bi bi-bag"></i>
                <span class="site-cart-count">0</span>
            </a>
        </div>

        <button class="mobile-nav-toggle" type="button" aria-expanded="false" aria-controls="mobileNavigation" aria-label="Toggle navigation">
            <span></span>
        </button>

        <nav class="mobile-nav-panel" id="mobileNavigation" aria-label="Mobile navigation">
            <ul class="mobile-nav-list">
                <li>
                    <div class="mobile-nav-row"><a href="{{ route('shop.mens-tops') }}">Shop</a><button class="mobile-submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Shop menu">+</button></div>
                    <ul class="mobile-submenu">
                        <li><a href="{{ route('shop.mens-tops') }}">Men's Tops</a></li><li><a href="{{ route('shop.mens-bottoms') }}">Men's Bottoms</a></li><li><a href="{{ route('shop.womens-tops') }}">Women's Tops</a></li><li><a href="{{ route('shop.womens-bottoms') }}">Women's Bottoms</a></li><li><a href="{{ route('shop.hats') }}">Hats</a></li><li><a href="{{ route('shop.bags') }}">Bags</a></li>
                    </ul>
                </li>
                <li>
                    <div class="mobile-nav-row"><a href="{{ route('teamwear.allTeamwear') }}">Teamwear</a><button class="mobile-submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Teamwear menu">+</button></div>
                    <ul class="mobile-submenu">
                        <li><a href="{{ route('teamwear.allTeamwear') }}">All Teamwear</a></li><li><a href="{{ route('teamwear.mensGameJerseys') }}">Men's Game Jerseys</a></li><li><a href="{{ route('teamwear.mensShorts') }}">Men's Shorts</a></li><li><a href="{{ route('teamwear.mensShooters') }}">Men's Shooters</a></li><li><a href="{{ route('teamwear.mensReversibles') }}">Men's Reversibles</a></li><li><a href="{{ route('teamwear.womensRacerbacks') }}">Women's Racerbacks</a></li><li><a href="{{ route('teamwear.womensShortsKilts') }}">Women's Shorts &amp; Kilts</a></li><li><a href="{{ route('teamwear.womensShooters') }}">Women's Shooters</a></li><li><a href="{{ route('teamwear.outerwear') }}">Outerwear</a></li><li><a href="{{ route('teamwear.hoodies') }}">Hoodies</a></li><li><a href="{{ route('teamwear.joggersSweats') }}">Joggers &amp; Sweats</a></li><li><a href="{{ route('teamwear.lpp') }}">LPP</a></li>
                    </ul>
                </li>
                <li>
                    <div class="mobile-nav-row"><a href="{{ route('custom.customGraphicDesign') }}">Custom</a><button class="mobile-submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Custom menu">+</button></div>
                    <ul class="mobile-submenu">
                        <li><a href="{{ route('custom.teamStores') }}">Team Stores</a></li><li><a href="{{ route('custom.customGraphicDesign') }}">Custom Graphic Design</a></li><li><a href="{{ route('custom.sizingCharts') }}">Sizing Charts</a></li><li><a href="{{ route('custom.fabric') }}">Fabric</a></li><li><a href="{{ route('custom.embellishment') }}">Embellishment</a></li>
                    </ul>
                </li>
                <li>
                    <div class="mobile-nav-row"><a href="{{ route('events.battleOfTheBay') }}">Events</a><button class="mobile-submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Events menu">+</button></div>
                    <ul class="mobile-submenu">
                        <li><a href="{{ route('events.battleOfTheBay') }}">Battle of the Bay</a></li><li><a href="{{ route('events.impact10Showcase') }}">Impact10 Showcase</a></li><li><a href="{{ route('events.hawaiiYouthLacrosseClassic') }}">Hawaii Youth Lacrosse Classic</a></li><li><a href="{{ route('events.lasVegasLacrosseShowcase') }}">Las Vegas Lacrosse Showcase</a></li><li><a href="{{ route('events.kingsShowcase') }}">King's Showcase</a></li><li><a href="{{ route('events.buffaloWingsBoxLacrosse') }}">Buffalo Wings Box Lacrosse</a></li>
                    </ul>
                </li>
                <li>
                    <div class="mobile-nav-row"><a href="{{ route('international.sriLanka') }}">International</a><button class="mobile-submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle International menu">+</button></div>
                    <ul class="mobile-submenu">
                        <li><a href="{{ route('international.sriLanka') }}">Sri Lanka</a></li><li><a href="{{ route('international.philippines') }}">Philippines</a></li><li><a href="{{ route('international.ecuador') }}">Ecuador</a></li><li><a href="{{ route('international.uganda') }}">Uganda</a></li><li><a href="{{ route('international.japan') }}">Japan</a></li><li><a href="{{ route('international.berlin') }}">Berlin</a></li><li><a href="{{ route('international.colombia') }}">Colombia</a></li><li><a href="{{ route('international.trinidadAndTobago') }}">Trinidad &amp; Tobago Lacrosse</a></li>
                    </ul>
                </li>
                <li><div class="mobile-nav-row"><a href="{{ route('about') }}">About</a></div></li>
                <li><div class="mobile-nav-row"><a href="{{ route('privateTraining') }}">Private Training</a></div></li>
            </ul>

            <div class="mobile-nav-tools">
                <a class="site-tool" href="#" aria-label="Search"><i class="bi bi-search"></i></a>
                <a class="site-tool" href="#" aria-label="Account"><i class="bi bi-person"></i></a>
                <a class="site-tool" href="#" aria-label="Cart"><i class="bi bi-bag"></i><span class="site-cart-count">0</span></a>
            </div>
        </nav>
    </div>
</header>
