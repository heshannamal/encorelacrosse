<style>
    .encore-footer {
        margin: 0;
        padding: 31px 20px 27px;
        background: #d3d3d3;
        color: #545454;
        border: 0;
        text-align: center;
    }

    .encore-footer__inner {
        width: min(100%, 980px);
        margin: 0 auto;
    }

    .encore-footer__nav {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 8px 26px;
        margin: 0 0 16px;
        padding: 0;
        list-style: none;
    }

    .encore-footer__nav a {
        color: #656565;
        font-family: 'Oswald', Arial, sans-serif;
        font-size: 20px;
        font-weight: 300;
        line-height: 1.15;
        letter-spacing: 0;
        text-decoration: none;
        text-transform: uppercase;
        transition: color .18s ease;
    }

    .encore-footer__nav a:hover,
    .encore-footer__nav a:focus-visible {
        color: #222;
    }

    .encore-footer__socials {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .encore-footer__socials a {
        width: 23px;
        height: 23px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #555;
        font-size: 23px;
        line-height: 1;
        text-decoration: none;
        transition: color .18s ease, transform .18s ease;
    }

    .encore-footer__socials a:hover,
    .encore-footer__socials a:focus-visible {
        color: #222;
        transform: translateY(-1px);
    }

    .encore-footer__meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 6px 26px;
        margin-bottom: 0;
        color: #4d4d4d;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 13px;
        line-height: 1.35;
    }

    .encore-footer__payments {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 34px;
        margin-bottom: 18px;
    }

    .encore-footer__payment-logo {
        width: 50px;
        height: 32px;
        padding: 4px 6px;
        display: block;
        object-fit: contain;
        border: 1px solid rgba(0, 0, 0, .12);
        border-radius: 4px;
        background: rgba(255, 255, 255, .7);
    }

    @media (max-width: 767.98px) {
        .encore-footer {
            padding: 27px 16px 24px;
        }

        .encore-footer__nav {
            gap: 8px 17px;
            margin-bottom: 14px;
        }

        .encore-footer__nav a {
            font-size: 17px;
        }

        .encore-footer__meta {
            flex-direction: column;
            gap: 3px;
            margin-bottom: 19px;
            font-size: 11px;
        }
    }

    @media (max-width: 480px) {
        .encore-footer__nav {
            max-width: 360px;
            margin-left: auto;
            margin-right: auto;
            gap: 8px 14px;
        }

        .encore-footer__nav a {
            font-size: 15px;
        }

        .encore-footer__socials a {
            font-size: 21px;
        }
    }
</style>

<footer class="encore-footer">
    <div class="encore-footer__inner">
        <nav aria-label="Footer navigation">
            <ul class="encore-footer__nav">
                <li><a href="{{ route('allProduct') }}">Shop</a></li>
                <li><a href="{{ url('/pages/teamwear') }}">Teamwear</a></li>
                <li><a href="{{ url('/') }}">Custom</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="{{ url('/pages/international') }}">International</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('privateTraining') }}">Private Training</a></li>
            </ul>
        </nav>

        <div class="encore-footer__socials" aria-label="Social media">
            <a
                href="https://www.instagram.com/encorelacrosse/"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Encore Lacrosse on Instagram"
                title="Instagram"
            >
                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
            </a>
        </div>

        <div class="encore-footer__payments" aria-label="Accepted payment methods">
            <img src="{{ asset('images/payment/visa.webp') }}" alt="Visa" class="encore-footer__payment-logo">
            <img src="{{ asset('images/payment/mastercard.webp') }}" alt="Mastercard" class="encore-footer__payment-logo">
            <img src="{{ asset('images/payment/amex.webp') }}" alt="American Express" class="encore-footer__payment-logo">
        </div>

        <div class="encore-footer__meta">
            <span>&copy; {{ date('Y') }}, Encore Lacrosse Apparel</span>
            <span>Powered by Encore Custom</span>
        </div>
    </div>
</footer>
