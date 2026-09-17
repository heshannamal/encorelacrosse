<footer class="site-footer" role="contentinfo">
    <nav aria-label="Footer navigation">
        <ul class="site-footer-nav">
            <li><a href="{{ route('shop.mens-tops') }}">Shop</a></li>
            <li><a href="{{ route('teamwear.allTeamwear') }}">Teamwear</a></li>
            <li><a href="{{ route('custom.customGraphicDesign') }}">Custom</a></li>
            <li><a href="{{ route('events.battleOfTheBay') }}">Events</a></li>
            <li><a href="{{ route('international.sriLanka') }}">International</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('privateTraining') }}">Private Training</a></li>
        </ul>
    </nav>

    <div class="site-footer-socials" aria-label="Encore social channels">
        <a href="https://facebook.com/encorebrand" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://twitter.com/encorelacrosse" target="_blank" rel="noopener" aria-label="X / Twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="https://www.instagram.com/encorelacrosse/" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.youtube.com/@encorelacrosse" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
    </div>

    <p class="site-footer-copy">© {{ date('Y') }} Encore Lacrosse Apparel &nbsp;&nbsp; Powered by Encore Custom</p>

    <div class="site-footer-payments" aria-label="Accepted payment methods">
        <span class="payment-mark">VISA</span>
        <span class="payment-mark">MC</span>
        <span class="payment-mark">AMEX</span>
        <span class="payment-mark">DISC</span>
        <span class="payment-mark">PAYPAL</span>
    </div>
</footer>
