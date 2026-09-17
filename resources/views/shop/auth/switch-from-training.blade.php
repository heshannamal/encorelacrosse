@extends('layouts.app')

@section('title', 'Switch to Shop | Encore Lacrosse Apparel')

@section('content')
@include('shop.ecommerce._styles')
<div class="ec-shop"><div class="ec-auth-wrap">
    <div class="ec-auth-icon"><i class="bi bi-arrow-left-right"></i></div>
    <div class="ec-auth-head"><div class="ec-shop-kicker">Customer Account</div><h1 class="ec-shop-title">Switch to Shop?</h1><p class="ec-shop-subtitle">Your current customer session is using another module. Switch context to sign in to the Encore shop.</p></div>
    <div class="ec-card"><div class="ec-card-body">
        <form method="POST" action="{{ $continueUrl }}">@csrf<button class="ec-btn ec-btn-dark ec-btn-full" type="submit">Continue to Shop</button></form>
        <a href="{{ $cancelUrl }}" class="ec-btn ec-btn-light ec-btn-full" style="margin-top:10px">Cancel</a>
    </div></div>
</div></div>
@endsection
