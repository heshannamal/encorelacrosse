@extends('layouts.app')

@section('title', 'My Account | Encore Lacrosse Apparel')

@section('content')
@include('shop.profile._theme')
@include('shop.ecommerce._loader')

@php
    $user = is_array($user ?? null) ? $user : [];
    $customer = is_array($customer ?? null) ? $customer : [];
    $summary = is_array($summary ?? null) ? $summary : [];
    $apiError = $apiError ?? null;

    $firstName = data_get($customer, 'first_name', data_get($user, 'first_name', ''));
    $lastName = data_get($customer, 'last_name', data_get($user, 'last_name', ''));
    $fullName = trim($firstName . ' ' . $lastName);

    if ($fullName === '') {
        $fullName = data_get($user, 'name', 'Encore Customer');
    }

    $email = data_get($customer, 'user_detail.email')
        ?: data_get($user, 'email')
        ?: '—';

    $phone = data_get($customer, 'phone_number')
        ?: data_get($customer, 'phone')
        ?: '—';

    $country = data_get($customer, 'country')
        ?: data_get($customer, 'country_name')
        ?: '—';

    $address = data_get($customer, 'address') ?: '—';
    $street = data_get($customer, 'street') ?: '—';
    $city = data_get($customer, 'city') ?: '—';
    $state = data_get($customer, 'state') ?: '—';
    $postalCode = data_get($customer, 'postal_code') ?: '—';

    $initials = collect(preg_split('/\s+/', trim($fullName)))
        ->filter()
        ->take(2)
        ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
        ->implode('');

    $initials = $initials ?: 'EC';
@endphp

<div class="encore-profile-page">
    <div class="encore-profile-layout">
        <aside class="encore-profile-sidebar">
            <div class="encore-profile-sidebar-inner">
                <div class="encore-profile-user">
                    <div class="encore-profile-avatar">{{ $initials }}</div>
                    <div>
                        <h2>{{ $fullName }}</h2>
                        <p>{{ $email }}</p>
                    </div>
                </div>

                <nav class="encore-profile-nav" aria-label="Account navigation">
                    <a href="{{ route('profile') }}" class="active">
                        <i class="fa-solid fa-circle-user"></i>
                        <span>Personal Information</span>
                    </a>

                    <a href="{{ route('cart') }}">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>My Cart</span>
                    </a>

                    <a href="{{ route('shop.mens-tops') }}">
                        <i class="fa-solid fa-store"></i>
                        <span>Continue Shopping</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Sign Out</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <main class="encore-profile-main">
            <div class="encore-profile-main-inner">
                @if($apiError)
                    <div class="encore-profile-alert">{{ $apiError }}</div>
                @endif

                <header class="encore-profile-head">
                    <div>
                        <h1>My Account</h1>
                        <p>Your Encore Lacrosse account details and order summary.</p>
                    </div>

                    <a href="{{ route('shop.mens-tops') }}" class="encore-profile-btn">
                        <i class="fa-solid fa-bag-shopping"></i>
                        Shop Now
                    </a>
                </header>

                <div class="encore-profile-stats">
                    <div class="encore-profile-card encore-profile-stat">
                        <div class="encore-profile-stat-icon"><i class="fa-solid fa-box"></i></div>
                        <div>
                            <strong>{{ (int) data_get($summary, 'totalOrders', 0) }}</strong>
                            <span>Total Orders</span>
                        </div>
                    </div>

                    <div class="encore-profile-card encore-profile-stat">
                        <div class="encore-profile-stat-icon"><i class="fa-solid fa-box-open"></i></div>
                        <div>
                            <strong>{{ (int) data_get($summary, 'inPacking', 0) }}</strong>
                            <span>In Packing</span>
                        </div>
                    </div>

                    <div class="encore-profile-card encore-profile-stat">
                        <div class="encore-profile-stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                        <div>
                            <strong>{{ (int) data_get($summary, 'delivered', 0) }}</strong>
                            <span>Delivered</span>
                        </div>
                    </div>

                    <div class="encore-profile-card encore-profile-stat">
                        <div class="encore-profile-stat-icon"><i class="fa-solid fa-rotate-left"></i></div>
                        <div>
                            <strong>{{ (int) data_get($summary, 'refundAndCancel', 0) }}</strong>
                            <span>Refund / Cancel</span>
                        </div>
                    </div>
                </div>

                <section class="encore-profile-card">
                    <div class="encore-profile-section">
                        <h2>Contact Information</h2>

                        <div class="encore-profile-fields">
                            <div class="encore-profile-field">
                                <span class="encore-profile-label">First Name</span>
                                <div class="encore-profile-value">{{ $firstName ?: '—' }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">Last Name</span>
                                <div class="encore-profile-value">{{ $lastName ?: '—' }}</div>
                            </div>

                            <div class="encore-profile-field full">
                                <span class="encore-profile-label">Email</span>
                                <div class="encore-profile-value">{{ $email }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">Country</span>
                                <div class="encore-profile-value">{{ $country }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">Phone</span>
                                <div class="encore-profile-value">{{ $phone }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="encore-profile-section">
                        <h2>Delivery Address</h2>

                        <div class="encore-profile-fields">
                            <div class="encore-profile-field full">
                                <span class="encore-profile-label">Address</span>
                                <div class="encore-profile-value">{{ $address }}</div>
                            </div>

                            <div class="encore-profile-field full">
                                <span class="encore-profile-label">Street / Apartment / Suite</span>
                                <div class="encore-profile-value">{{ $street }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">City</span>
                                <div class="encore-profile-value">{{ $city }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">State</span>
                                <div class="encore-profile-value">{{ $state }}</div>
                            </div>

                            <div class="encore-profile-field">
                                <span class="encore-profile-label">Postal Code</span>
                                <div class="encore-profile-value">{{ $postalCode }}</div>
                            </div>
                        </div>

                        <div class="encore-profile-actions">
                            <a href="{{ route('checkout') }}" class="encore-profile-action-link">
                                <i class="fa-solid fa-pen"></i>
                                Update Address at Checkout
                            </a>

                            <a href="{{ route('cart') }}" class="encore-profile-action-link">
                                <i class="fa-solid fa-bag-shopping"></i>
                                View Cart
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</div>

@include('shop.ecommerce._cart-sync')
@endsection