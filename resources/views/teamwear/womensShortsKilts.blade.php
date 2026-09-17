@extends('layouts.app')

@section('content')
@php
    $pageHeading = "Women's Shorts & Kilts";
    $formId = 'womens-shorts-kilts';
    $heroImage = 'images/teamwear/womensShortsKilts/hero.jpg';
    $messagePlaceholder = "I'm interested in women's shorts and kilts...";

    $products = [
        [
            'title' => "WOMEN'S COLLEGIATE SHORT",
            'description' => 'The Collegiate shorts are designed do be functionals, reliable and stylish throughout any era. 5 panel short with varying inseam, pocket and waistband options, the collegiate short is for the players who are focused on dominated the field by her play and passion.',
            'features' => [
                'Classic fit',
                'Fabric Deztek | DezTek Lite | HydroTek | LatTek',
            ],
            'images' => [
                'images/teamwear/womensShortsKilts/collegiate-short-front.webp',
                'images/teamwear/womensShortsKilts/collegiate-short-back.webp',
                'images/teamwear/womensShortsKilts/collegiate-short-right.webp',
                'images/teamwear/womensShortsKilts/collegiate-short-left.webp',
            ],
        ],
        [
            'title' => "WOMEN'S COLLEGIATE KILT",
            'description' => '',
            'features' => [
                '2 panel construction',
                'Fabric LatTek | ActionTek | HydroTek',
                'Gathered style waistband',
            ],
            'images' => [],
        ],
        [
            'title' => "WOMEN'S PRO KILT",
            'description' => '',
            'features' => [
                '2 panel construction',
                'Fabric LatTek | ActionTek | HydroTek',
                'Flat style waistband',
            ],
            'images' => [
                'images/teamwear/womensShortsKilts/pro-kilt-front.webp',
                'images/teamwear/womensShortsKilts/pro-kilt-back.webp',
                'images/teamwear/womensShortsKilts/pro-kilt-right.webp',
                'images/teamwear/womensShortsKilts/pro-kilt-left.webp',
            ],
        ],
        [
            'title' => "WOMEN'S RISE UP SHORTS",
            'description' => "Elevate your game with the RiseUp shorts, designed for women who lead with confidence and style. Featuring a modern cut with a comfortable waistband, these shorts offer the perfect blend of functionality and fashion. With a flattering fit and versatile design, the RiseUp shorts are ideal for athletes who are determined to make a statement on and off the field. Whether you're pushing your limits in training or commanding attention during the game, these shorts are your go-to choice for peak performance.",
            'features' => [
                'Fabric- HydroTek',
            ],
            'images' => [
                'images/teamwear/womensShortsKilts/rise-up-front.jpg',
                'images/teamwear/womensShortsKilts/rise-up-back.jpg',
                'images/teamwear/womensShortsKilts/rise-up-right.jpg',
                'images/teamwear/womensShortsKilts/rise-up-left.jpg',
            ],
        ],
        [
            'title' => "WOMEN'S DIG COMPRESSION SHORTS",
            'description' => "Stay focused and unstoppable in the Women's Dig Compression Shorts. Engineered for performance, these shorts provide a snug, supportive fit that enhances your movement while offering optimal comfort. The moisture-wicking fabric keeps you cool and dry, even during the most intense workouts. Designed with a sleek silhouette and flatlock seams to reduce chafing, the Dig Compression Shorts are perfect for athletes who demand both style and functionality. Whether you're hitting the gym, the field, or the court, these shorts will keep you digging deep and performing at your best.",
            'features' => [],
            'images' => [
                'images/teamwear/womensShortsKilts/dig-front.webp',
                'images/teamwear/womensShortsKilts/dig-back.webp',
                'images/teamwear/womensShortsKilts/dig-right.webp',
                'images/teamwear/womensShortsKilts/dig-left.webp',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/womensShortsKilts/customize-01.jpg',
        'images/teamwear/womensShortsKilts/customize-02.jpg',
        'images/teamwear/womensShortsKilts/customize-03.jpg',
        'images/teamwear/womensShortsKilts/customize-04.jpg',
        'images/teamwear/womensShortsKilts/customize-05.jpg',
    ];

    $galleryImages = [
        'images/teamwear/womensShortsKilts/gallery-01.jpg',
        'images/teamwear/womensShortsKilts/gallery-02.jpg',
        'images/teamwear/womensShortsKilts/gallery-03.jpg',
        'images/teamwear/womensShortsKilts/gallery-04.jpg',
        'images/teamwear/womensShortsKilts/gallery-05.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
