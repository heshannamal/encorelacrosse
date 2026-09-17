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
        margin-bottom: 13px;
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
        margin-bottom: 24px;
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
        gap: 8px;
        min-height: 29px;
    }

    .encore-payment {
        height: 28px;
        min-width: 37px;
        padding: 0 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 2px;
        color: #555;
        font-family: Arial, sans-serif;
        font-size: 8px;
        font-weight: 700;
        line-height: 1;
        letter-spacing: -.02em;
    }

    .encore-payment--amex {
        width: 31px;
        padding: 0;
        background: #676767;
        color: #e8e8e8;
        font-size: 6px;
        line-height: 1.05;
    }

    .encore-payment--apple {
        min-width: 39px;
        border: 1px solid #a7a7a7;
        background: #dedede;
        font-size: 8px;
    }

    .encore-payment--diners {
        min-width: 32px;
        padding: 0;
        font-size: 19px;
        font-weight: 400;
    }

    .encore-payment--discover {
        min-width: 42px;
        padding: 0;
        font-size: 6px;
    }

    .encore-payment--mastercard {
        min-width: 34px;
        padding: 0;
        font-size: 7px;
    }

    .encore-payment--paypal {
        min-width: 38px;
        padding: 0;
        font-size: 8px;
        font-style: italic;
    }

    .encore-payment--visa {
        min-width: 31px;
        padding: 0;
        font-size: 11px;
        font-style: italic;
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
                <li><a href="{{ url('/collections/all-products') }}">Shop</a></li>
                <li><a href="{{ url('/pages/teamwear') }}">Teamwear</a></li>
                <li><a href="{{ url('/') }}">Custom</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="{{ url('/pages/international') }}">International</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('privateTraining') }}">Private Training</a></li>
            </ul>
        </nav>

        <div class="encore-footer__socials" aria-label="Social media">
            <a href="#" aria-label="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a href="#" aria-label="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" aria-label="YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        </div>

        <div class="encore-footer__meta">
            <span>&copy; {{ date('Y') }}, Encore Lacrosse Apparel</span>
            <span>Powered by Encore Custom</span>
        </div>

        <div class="encore-footer__payments" aria-label="Accepted payment methods">
            <span class="encore-payment encore-payment--amex">AMERICAN<br>EXPRESS</span>
            <span class="encore-payment encore-payment--apple"><i class="fa fa-apple" aria-hidden="true"></i>&nbsp;Pay</span>
            <span class="encore-payment encore-payment--diners">◐</span>
            <span class="encore-payment encore-payment--discover">DISCOVER</span>
            <span class="encore-payment encore-payment--mastercard">MasterCard</span>
            <span class="encore-payment encore-payment--paypal">PayPal</span>
            <span class="encore-payment encore-payment--visa">VISA</span>
        </div>
    </div>
</footer>
