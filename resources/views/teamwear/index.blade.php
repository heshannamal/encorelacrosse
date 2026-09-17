@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pages/teamwear.css') }}">

<div class="teamwear-page">
    <section class="teamwear-hero teamwear-hero--intro">
        <img src="{{ asset($hero['image']) }}" alt="Encore custom team apparel" class="teamwear-hero__image">
        <div class="teamwear-hero__content teamwear-hero__content--intro">
            <h1>{{ $hero['title'] }}</h1>
            <p>{{ $hero['subtitle'] }}</p>
            <div class="teamwear-section-ribbon">MEN’S CORE COLLECTION</div>
        </div>
    </section>

    <section class="teamwear-grid teamwear-grid--four" aria-label="Men's core collection">
        @foreach ($mens as $item)
            <a href="{{ $item['url'] }}" class="teamwear-tile">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['label'] }}" loading="lazy">
                <span class="teamwear-tile__label">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </section>

    <section class="teamwear-hero teamwear-hero--collection">
        <img src="{{ asset($womensHero) }}" alt="Women's core collection" class="teamwear-hero__image" loading="lazy">
        <div class="teamwear-hero__content">
            <div class="teamwear-section-ribbon">WOMEN’S CORE COLLECTION</div>
        </div>
    </section>

    <section class="teamwear-grid teamwear-grid--four" aria-label="Women's core collection">
        @foreach ($womens as $item)
            <a href="{{ $item['url'] }}" class="teamwear-tile">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['label'] }}" loading="lazy">
                <span class="teamwear-tile__label">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </section>

    <section class="teamwear-hero teamwear-hero--off-field">
        <img src="{{ asset($offFieldHero) }}" alt="Encore off field apparel" class="teamwear-hero__image" loading="lazy">
        <div class="teamwear-offfield-copy" aria-label="Off field fashion and creativity">
            <span class="teamwear-offfield-copy__top">OFF FIELD</span>
            <span class="teamwear-offfield-copy__dark">F A S H I O N</span>
            <span class="teamwear-offfield-copy__plus">+</span>
            <span class="teamwear-offfield-copy__dark teamwear-offfield-copy__dark--wide">C R E A T I V I T Y</span>
        </div>
    </section>

    <section class="teamwear-grid teamwear-grid--three" aria-label="Off field collection">
        @foreach ($offField as $item)
            <a href="{{ $item['url'] }}" class="teamwear-tile teamwear-tile--large">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['label'] }}" loading="lazy">
                <span class="teamwear-tile__label">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </section>

    <section class="teamwear-hero teamwear-hero--collection teamwear-hero--accessories">
        <img src="{{ asset($accessoriesHero) }}" alt="Encore accessories" class="teamwear-hero__image" loading="lazy">
        <div class="teamwear-hero__content">
            <div class="teamwear-section-ribbon">ACCESSORIES</div>
        </div>
    </section>

    <section class="teamwear-accessories" aria-label="Accessories">
        <a href="{{ $accessories['featured']['url'] }}" class="teamwear-tile teamwear-accessories__featured">
            <img src="{{ asset($accessories['featured']['image']) }}" alt="{{ $accessories['featured']['label'] }}" loading="lazy">
            <span class="teamwear-tile__label">{{ $accessories['featured']['label'] }}</span>
        </a>

        <div class="teamwear-accessories__grid">
            @foreach ($accessories['grid'] as $item)
                <a href="{{ $item['url'] }}" class="teamwear-tile">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['label'] }}" loading="lazy">
                    <span class="teamwear-tile__label">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </div>
    </section>
</div>
@endsection
