@extends('layouts.app')

@section('title', 'Create Account | Encore Lacrosse Apparel')

@section('content')
@include('shop.ecommerce._styles')
@include('shop.ecommerce._loader')

<div class="ec-shop"><div class="ec-auth-wrap" style="max-width:720px">
    <div class="ec-auth-icon"><i class="bi bi-person-plus"></i></div>
    <div class="ec-auth-head"><div class="ec-shop-kicker">Join Encore</div><h1 class="ec-shop-title">Create Account</h1><p class="ec-shop-subtitle">Create your account to keep your cart and complete checkout.</p></div>
    <form id="ecRegisterForm" class="ec-card"><div class="ec-card-body">@csrf
        <div class="ec-grid-2">
            <div><label class="ec-label">First Name</label><input class="ec-input" name="f_name" required></div>
            <div><label class="ec-label">Last Name</label><input class="ec-input" name="l_name" required></div>
            <div style="grid-column:1/-1"><label class="ec-label">Email Address</label><input class="ec-input" type="email" name="email" required></div>
            <div><label class="ec-label">Password</label><input class="ec-input" type="password" name="password" minlength="8" required></div>
            <div><label class="ec-label">Confirm Password</label><input class="ec-input" type="password" name="password_confirmation" minlength="8" required></div>
        </div>
        <div id="ecRegisterError" class="ec-shop-message ec-shop-message-error" style="display:none;width:100%;margin:15px 0 0"></div>
        <button class="ec-btn ec-btn-dark ec-btn-full" id="ecRegisterButton" type="submit" style="margin-top:20px"><i class="bi bi-person-plus"></i> Create Account</button>
        <p class="ec-auth-link">Already registered? <a href="{{ route('login') }}">Sign in</a></p>
    </div></form>
</div></div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    const form=document.getElementById('ecRegisterForm');
    form.addEventListener('submit',async function(event){event.preventDefault();const button=document.getElementById('ecRegisterButton'),error=document.getElementById('ecRegisterError');error.style.display='none';EncoreShopUI.buttonLoading(button,true,'Creating account');try{const data=await EncoreShopUI.json(await fetch(@json(route('register.post')),{method:'POST',credentials:'same-origin',headers:{'Accept':'application/json','X-CSRF-TOKEN':form.querySelector('[name="_token"]').value},body:new FormData(form)}));if(!data.success)throw new Error(data.message||'Unable to create account.');if(data.warning)EncoreShopUI.toast(data.warning,'warning');EncoreShopUI.toast(data.message||'Account created.','success');setTimeout(()=>window.location.href=data.redirect||@json(route('allProduct')),300)}catch(err){error.textContent=err.message;error.style.display='block';EncoreShopUI.buttonLoading(button,false)}});
});
</script>
@endsection
