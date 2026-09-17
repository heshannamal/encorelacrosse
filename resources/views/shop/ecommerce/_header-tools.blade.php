@php
    $encoreLoggedIn = !empty(session('encore_user_token')) || !empty(session('auth_api_token'));
    $encoreUser = is_array(session('encore_user')) ? session('encore_user') : [];
    $encoreUserName = trim((string) (data_get($encoreUser, 'name') ?: trim((string) data_get($encoreUser, 'first_name', '') . ' ' . (string) data_get($encoreUser, 'last_name', ''))));
    $encoreUserName = $encoreUserName !== '' ? $encoreUserName : 'My Account';
    $encoreUserEmail = (string) data_get($encoreUser, 'email', '');
@endphp

<style>
    .encore-shop-search-overlay{position:fixed;inset:0;z-index:1300;display:none;background:rgba(0,0,0,.48);backdrop-filter:blur(4px)}
    .encore-shop-search-overlay.is-open{display:block}
    .encore-shop-search-panel{position:absolute;top:0;left:0;right:0;padding:26px 22px 30px;background:#fff;box-shadow:0 14px 40px rgba(0,0,0,.16)}
    .encore-shop-search-inner{width:min(900px,100%);margin:0 auto}
    .encore-shop-search-top{display:flex;align-items:center;justify-content:space-between;gap:20px;margin-bottom:16px}
    .encore-shop-search-title{margin:0;font-family:'Oswald',sans-serif;font-size:26px;font-weight:400;text-transform:uppercase;color:#303030}
    .encore-shop-search-close{width:38px;height:38px;border:0;background:transparent;color:#333;font-size:23px}
    .encore-shop-search-form{display:grid;grid-template-columns:1fr 52px;border-bottom:2px solid #2b2b2b}
    .encore-shop-search-form input{height:54px;border:0;outline:0;padding:0 8px;background:#fff;color:#222;font-size:18px}
    .encore-shop-search-form button{border:0;background:#fff;color:#222;font-size:20px}
    .encore-shop-search-hint{margin:11px 0 0;color:#888;font-size:12px}

    .encore-account-popover{position:fixed;z-index:1250;width:260px;padding:0;background:#fff;border:1px solid #e3e3e3;box-shadow:0 14px 38px rgba(0,0,0,.14);display:none}
    .encore-account-popover.is-open{display:block}
    .encore-account-user{padding:18px;border-bottom:1px solid #ededed}
    .encore-account-user strong{display:block;font-family:'Oswald',sans-serif;font-size:17px;font-weight:400;text-transform:uppercase;color:#262626}
    .encore-account-user span{display:block;margin-top:3px;color:#8a8a8a;font-size:11px;overflow:hidden;text-overflow:ellipsis}
    .encore-account-links{padding:7px 0}
    .encore-account-links a,.encore-account-links button{width:100%;padding:11px 17px;display:block;border:0;background:#fff;color:#424242;text-align:left;text-decoration:none;font-family:'Oswald',sans-serif;font-size:15px;font-weight:300;text-transform:uppercase}
    .encore-account-links a:hover,.encore-account-links button:hover{background:#f7f7f7;color:#111}
    .encore-account-links form{margin:0}

    @media(max-width:991.98px){.encore-shop-search-panel{padding-top:18px}.encore-shop-search-title{font-size:22px}}
</style>

<div class="encore-shop-search-overlay" id="encoreShopSearchOverlay" aria-hidden="true">
    <div class="encore-shop-search-panel" role="dialog" aria-modal="true" aria-label="Search products">
        <div class="encore-shop-search-inner">
            <div class="encore-shop-search-top">
                <h2 class="encore-shop-search-title">Search Products</h2>
                <button type="button" class="encore-shop-search-close" id="encoreShopSearchClose" aria-label="Close search"><i class="bi bi-x-lg"></i></button>
            </div>
            <form action="{{ route('allProduct') }}" method="GET" class="encore-shop-search-form">
                <input type="search" name="search" id="encoreShopSearchInput" value="{{ request('search') }}" placeholder="What are you looking for?" autocomplete="off">
                <button type="submit" aria-label="Search"><i class="bi bi-search"></i></button>
            </form>
            <p class="encore-shop-search-hint">Search by product name, display name, product number or pattern code.</p>
        </div>
    </div>
</div>

@if($encoreLoggedIn)
<div class="encore-account-popover" id="encoreAccountPopover" aria-hidden="true">
    <div class="encore-account-user">
        <strong>{{ $encoreUserName }}</strong>
        @if($encoreUserEmail !== '')<span>{{ $encoreUserEmail }}</span>@endif
    </div>
    <div class="encore-account-links">
        <a href="{{ route('allProduct') }}">Shop</a>
        <a href="{{ route('cart') }}">My Cart</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit">Sign Out</button></form>
    </div>
</div>
@endif

<script>
(function(){
    function initEncoreHeaderShop(){
        var searchOverlay=document.getElementById('encoreShopSearchOverlay');
        var searchInput=document.getElementById('encoreShopSearchInput');
        var searchClose=document.getElementById('encoreShopSearchClose');
        var accountPopover=document.getElementById('encoreAccountPopover');
        var loggedIn=@json($encoreLoggedIn);

        document.querySelectorAll('.encore-tool[aria-label="Search"], .encore-mobile-actions a[aria-label="Search"]').forEach(function(trigger){
            trigger.setAttribute('href','#');
            trigger.addEventListener('click',function(e){
                e.preventDefault();
                if(!searchOverlay)return;
                searchOverlay.classList.add('is-open');
                searchOverlay.setAttribute('aria-hidden','false');
                setTimeout(function(){searchInput&&searchInput.focus()},40);
            });
        });

        function closeSearch(){
            if(!searchOverlay)return;
            searchOverlay.classList.remove('is-open');
            searchOverlay.setAttribute('aria-hidden','true');
        }
        searchClose&&searchClose.addEventListener('click',closeSearch);
        searchOverlay&&searchOverlay.addEventListener('click',function(e){if(e.target===searchOverlay)closeSearch()});
        document.addEventListener('keydown',function(e){if(e.key==='Escape'){closeSearch();closeAccount()}});

        document.querySelectorAll('.encore-cart, .encore-mobile-cart').forEach(function(link){link.setAttribute('href',@json(route('cart')))});
        document.querySelectorAll('.encore-cart-count, .encore-mobile-cart span').forEach(function(badge){badge.setAttribute('data-encore-cart-count','')});

        var accountTrigger=document.querySelector('.encore-tool[aria-label="Account"]');
        if(accountTrigger){
            if(loggedIn){
                accountTrigger.setAttribute('href','#');
                accountTrigger.addEventListener('click',function(e){
                    e.preventDefault();
                    if(!accountPopover)return;
                    var rect=accountTrigger.getBoundingClientRect();
                    accountPopover.style.top=(rect.bottom+8)+'px';
                    accountPopover.style.left=Math.max(12,Math.min(window.innerWidth-272,rect.right-260))+'px';
                    accountPopover.classList.toggle('is-open');
                    accountPopover.setAttribute('aria-hidden',accountPopover.classList.contains('is-open')?'false':'true');
                });
            }else{
                accountTrigger.setAttribute('href',@json(route('login')));
            }
        }

        function closeAccount(){
            if(!accountPopover)return;
            accountPopover.classList.remove('is-open');
            accountPopover.setAttribute('aria-hidden','true');
        }
        document.addEventListener('click',function(e){
            if(!accountPopover||!accountPopover.classList.contains('is-open'))return;
            if(accountPopover.contains(e.target)||(accountTrigger&&accountTrigger.contains(e.target)))return;
            closeAccount();
        });

        function syncHeaderCount(){
            fetch(@json(route('cart.count')),{headers:{'Accept':'application/json'},credentials:'same-origin'})
                .then(function(r){return r.json()})
                .then(function(data){
                    var count=Number(data.count||0);
                    document.querySelectorAll('[data-encore-cart-count]').forEach(function(badge){
                        badge.textContent=count>99?'99+':String(count);
                        badge.style.display=count>0?'inline-flex':'none';
                    });
                }).catch(function(){});
        }
        syncHeaderCount();
        window.syncEncoreHeaderCartCount=syncHeaderCount;
    }

    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',initEncoreHeaderShop);else initEncoreHeaderShop();
})();
</script>
