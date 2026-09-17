@extends('layouts.app')

@section('title', 'Sign In | Encore Lacrosse Apparel')

@section('content')
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')

<div class="ec-shop">
    <div class="ec-auth-wrap">
        @include('shop.ecommerce._flash')
        @if(!empty($apiError ?? null))<div class="ec-shop-message ec-shop-message-error" style="width:100%">{{ $apiError }}</div>@endif

        <div class="ec-auth-icon"><i class="bi bi-person"></i></div>
        <div class="ec-auth-head">
            <div class="ec-shop-kicker">Encore Account</div>
            <h1 class="ec-shop-title">Welcome Back</h1>
            <p class="ec-shop-subtitle">Sign in to access your cart and complete checkout.</p>
        </div>

        <div class="ec-card">
            <div class="ec-card-body">
                <a href="{{ route('auth.google.redirect') }}" class="ec-btn ec-btn-light ec-btn-full" id="ecGoogleLogin"><span style="font-weight:700;color:#4285f4">G</span> Continue with Google</a>
                <div style="display:flex;align-items:center;gap:12px;margin:18px 0;color:#aaa;font-size:10px;text-transform:uppercase"><span style="height:1px;background:#e6e6e6;flex:1"></span>or sign in with email<span style="height:1px;background:#e6e6e6;flex:1"></span></div>

                <form id="ecLoginForm">
                    @csrf
                    <div><label class="ec-label">Email Address</label><input class="ec-input" type="email" name="email" autocomplete="email" placeholder="you@example.com" required autofocus></div>
                    <div style="margin-top:15px"><label class="ec-label">Password</label><input class="ec-input" type="password" name="password" autocomplete="current-password" placeholder="Enter your password" required></div>
                    <div id="ecLoginError" class="ec-shop-message ec-shop-message-error" style="display:none;width:100%;margin:15px 0 0"></div>
                    <button class="ec-btn ec-btn-dark ec-btn-full" id="ecLoginButton" type="submit" style="margin-top:20px"><i class="bi bi-box-arrow-in-right"></i> Sign In</button>
                </form>
                <p class="ec-auth-link">New to Encore? <a href="{{ route('register') }}">Create an account</a></p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    document.getElementById('ecGoogleLogin')?.addEventListener('click',()=>EncoreShopUI.showLoader('Connecting to Google'));
    const form=document.getElementById('ecLoginForm');
    form.addEventListener('submit',async function(event){event.preventDefault();const button=document.getElementById('ecLoginButton'),error=document.getElementById('ecLoginError');error.style.display='none';EncoreShopUI.buttonLoading(button,true,'Signing in');try{const data=await EncoreShopUI.json(await fetch(@json(route('login.post')),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':form.querySelector('[name="_token"]').value},body:new FormData(form)}));if(!data.success)throw new Error(data.message||'Unable to sign in.');if(data.warning)EncoreShopUI.toast(data.warning,'warning');EncoreShopUI.toast(data.message||'Signed in.','success');setTimeout(()=>window.location.href=data.redirect||@json(route('allProduct')),250)}catch(exception){error.textContent=exception.message;error.style.display='block';EncoreShopUI.buttonLoading(button,false)}});
});
</script>
@endsection
