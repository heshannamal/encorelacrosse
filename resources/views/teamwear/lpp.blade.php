@extends('layouts.app')

@section('content')
@php
    $pageHeading = 'LPP';
    $formId = 'lpp';
    $heroImage = 'images/teamwear/lpp/hero.jpg';
    $messagePlaceholder = "I'm interested in LPP gear...";

    $products = [
        [
            'title' => 'HOLSTER ARM PADS',
            'description' => 'The black and white Holster Arm Pads are designed to give players the ultimate protection during the toughest rivalries. Amplify your performances all while maintaining a truly comfortable fit. No slippage, optimal flexibility. Adjustable strap for secure and effective support.',
            'features' => [],
            'images' => [
                'images/teamwear/lpp/holster-front.jpg',
                'images/teamwear/lpp/holster-back.jpg',
                'images/teamwear/lpp/holster-left.jpg',
                'images/teamwear/lpp/holster-right.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/lpp/customize-01.jpg',
        'images/teamwear/lpp/customize-02.jpg',
        'images/teamwear/lpp/customize-03.jpg',
        'images/teamwear/lpp/customize-04.jpg',
    ];

    $galleryImages = [
        'images/teamwear/lpp/gallery-01.jpg',
        'images/teamwear/lpp/gallery-02.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
