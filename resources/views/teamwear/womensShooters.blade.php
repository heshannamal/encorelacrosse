@extends('layouts.app')

@section('content')
@php
    $pageHeading = "Women's Shooter Shirts";
    $formId = 'womens-shooters';
    $heroImage = 'images/teamwear/landing/teamwear-07.webp';
    $messagePlaceholder = "I'm interested in women's shooter shirts...";

    $products = [
        [
            'title' => "WOMEN'S PRO SHORT SLEEVE SHOOTER",
            'description' => "The Women's Pro Short Sleeve Shooter Shirt offers a raglan style sleeve to reduce seams along the shoulder. The bell shaped torso offers both fit and performance.",
            'features' => [
                'Raglan Sleeves',
                'Modern fit cut with side slits',
                'DezTek fabric is fully sublimatable with no limitation in design options, including full color artwork in any location, player name and individual numbers',
                'VersaTek fabric can be embellished with screen print',
            ],
            'images' => [
                'images/teamwear/womensShooters/pro-shooter-front.jpg',
                'images/teamwear/womensShooters/pro-shooter-back.jpg',
                'images/teamwear/womensShooters/pro-shooter-right.jpg',
                'images/teamwear/womensShooters/pro-shooter-left.jpg',
            ],
        ],
        [
            'title' => "WOMEN'S COLLEGIATE LS SHOOTER",
            'description' => "The Women's Collegiate Short Sleeve Shooter Shirt offers a bell shaped fit, and inset, T-Cut long sleeves.",
            'features' => [
                'T-Cut style Long Sleeve shooter',
                'Modern fit cut with side slits',
                'DezTek fabric is fully sublimatable with no limitation in design options, including full color artwork in any location, player name and individual numbers',
                'VersaTek fabric can be embellished with screen print',
            ],
            'images' => [
                'images/teamwear/womensShooters/collegiate-ls-front.jpg',
                'images/teamwear/womensShooters/collegiate-ls-back.jpg',
                'images/teamwear/womensShooters/collegiate-ls-right.jpg',
                'images/teamwear/womensShooters/collegiate-ls-left.jpg',
            ],
        ],
        [
            'title' => "WOMEN'S COLLEGIATE SS SHOOTER",
            'description' => "The Women's Collegiate Short Sleeve Shooter Shirt offers a bell shaped fit, and cap sleeves.",
            'features' => [
                'T-Cut style Short Sleeve shooter',
                'Modern fit cut with side slits',
                'DezTek fabric is fully sublimatable with no limitation in design options, including full color artwork in any location, player name and individual numbers',
                'VersaTek fabric can be embellished with screen print',
            ],
            'images' => [
                'images/teamwear/womensShooters/collegiate-ss-front.jpg',
                'images/teamwear/womensShooters/collegiate-ss-back.jpg',
                'images/teamwear/womensShooters/collegiate-ss-right.jpg',
                'images/teamwear/womensShooters/collegiate-ss-left.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/womensShooters/customize-01.jpg',
        'images/teamwear/womensShooters/customize-02.jpg',
        'images/teamwear/womensShooters/customize-03.jpg',
        'images/teamwear/womensShooters/customize-04.jpg',
    ];

    $galleryImages = [
        'images/teamwear/womensShooters/gallery-01.jpg',
        'images/teamwear/womensShooters/gallery-02.jpg',
        'images/teamwear/womensShooters/gallery-03.jpg',
        'images/teamwear/womensShooters/gallery-04.jpg',
        'images/teamwear/womensShooters/gallery-05.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
