@if(session('contact_success') || session('contact_error'))
    <div class="encore-contact-flash-wrap" id="encoreContactFlash" role="status" aria-live="polite">
        <div class="encore-contact-flash {{ session('contact_error') ? 'is-error' : 'is-success' }}">
            <span class="encore-contact-flash__icon">
                <i class="bi {{ session('contact_error') ? 'bi-exclamation-circle' : 'bi-check-circle' }}"></i>
            </span>
            <span>{{ session('contact_error') ?: session('contact_success') }}</span>
            <button type="button" class="encore-contact-flash__close" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

    <style>
        .encore-contact-flash-wrap{
            position:fixed;
            top:104px;
            left:50%;
            z-index:1090;
            width:min(620px,calc(100vw - 28px));
            transform:translateX(-50%);
        }
        .encore-contact-flash{
            display:grid;
            grid-template-columns:32px 1fr 28px;
            gap:10px;
            align-items:center;
            padding:13px 14px;
            border:1px solid #d8d8d8;
            background:#fff;
            color:#222;
            box-shadow:0 12px 32px rgba(0,0,0,.14);
            font-size:13px;
        }
        .encore-contact-flash.is-success{border-left:4px solid #1f9d62}
        .encore-contact-flash.is-error{border-left:4px solid #cf2e35}
        .encore-contact-flash__icon{
            width:30px;
            height:30px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#f5f5f5;
            border-radius:50%;
        }
        .encore-contact-flash.is-success .encore-contact-flash__icon{color:#16885a}
        .encore-contact-flash.is-error .encore-contact-flash__icon{color:#c42e33}
        .encore-contact-flash__close{
            width:28px;
            height:28px;
            padding:0;
            border:0;
            background:transparent;
            color:#888;
        }
        @media(max-width:991.98px){
            .encore-contact-flash-wrap{top:76px}
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var flash = document.getElementById('encoreContactFlash');
            if (!flash) return;

            var close = flash.querySelector('.encore-contact-flash__close');
            if (close) close.addEventListener('click', function () { flash.remove(); });

            window.setTimeout(function () {
                if (flash && flash.isConnected) flash.remove();
            }, 6500);
        });
    </script>
@endif
