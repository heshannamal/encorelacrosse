@extends('layouts.app')

@section('content')
@php
    $pageHeading = 'Joggers & Sweatpants';
    $formId = 'joggers-sweatpants';
    $heroImage = 'images/teamwear/joggersSweats/hero.jpg';
    $messagePlaceholder = "I'm interested in custom joggers and sweatpants...";

    $products = [
        [
            'title' => 'SIDELINE SWEATPANT',
            'designer_notes' => true,
            'description' => 'The Sideline Sweatpant is the twin of the classic hoodie- but not the baggy ones you remember your father wearing. This cut has a modern feel - designed to be athletic and rugged enough to wear on cold training days, and stylish enough to wear all day.',
            'features' => [
                'Zippered and standard pockets available',
                'Embellishment options include embroidery and screen print',
                'Custom tipped drawstring',
                'Available in Fleece and French Terry fabrics',
                'Modern fit item is true to size and designed to be slightly fitted',
            ],
            'images' => [
                'images/teamwear/joggersSweats/sideline-front.jpg',
                'images/teamwear/joggersSweats/sideline-back.jpg',
                'images/teamwear/joggersSweats/sideline-right.jpg',
                'images/teamwear/joggersSweats/sideline-left.jpg',
            ],
        ],
        [
            'title' => 'CAVALRY SWEATPANT',
            'designer_notes' => true,
            'description' => "The Cavalry Sweatpant is the Jeep of sweatpants- it's functional, rugged, and designed to be worn everywhere. Featuring an extended and tapered cuff for athletes to tuck into their cleats or socks, and keep high and tight for wet and snowy training days. The Cav offers the slimmer profile of a jogger, and dyno panel for maximum comfort and stability.",
            'features' => [
                'Zippered and standard pockets available',
                'Embellishment options include embroidery and screen print',
                'Custom tipped drawstring',
                'Available in Fleece and French Terry fabrics',
                'Modern fit item is true to size and designed to be sleek and fitted',
            ],
            'images' => [
                'images/teamwear/joggersSweats/cavalry-front.jpg',
                'images/teamwear/joggersSweats/cavalry-back.jpg',
                'images/teamwear/joggersSweats/cavalry-right.jpg',
                'images/teamwear/joggersSweats/cavalry-left.jpg',
            ],
        ],
        [
            'title' => 'TECH JOGGER',
            'designer_notes' => true,
            'description' => "The Tech Jogger is the performance partner in the group. Available in more fabrics and embellishment styles, the tech jogger gets it's name by being technically savvy and excellent on the field and in the action.",
            'features' => [
                'Zippered and standard pockets available',
                'Embellishment options include sublimation, embroidery and screen print, depending on the fabric selected',
                'Custom tipped drawstring',
                'Available in DezTek Heavy, VersaTek, Fleece and French Terry fabrics',
                'Modern fit item is true to size and designed to be sleek and fitted',
            ],
            'images' => [
                'images/teamwear/joggersSweats/tech-front.jpg',
                'images/teamwear/joggersSweats/tech-back.jpg',
                'images/teamwear/joggersSweats/tech-right.jpg',
                'images/teamwear/joggersSweats/tech-left.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/joggersSweats/customize-01.jpg',
        'images/teamwear/joggersSweats/customize-02.jpg',
        'images/teamwear/joggersSweats/customize-03.jpg',
        'images/teamwear/joggersSweats/customize-04.jpg',
    ];

    $galleryImages = [
        'images/teamwear/joggersSweats/gallery-01.jpg',
        'images/teamwear/joggersSweats/gallery-02.jpg',
        'images/teamwear/joggersSweats/gallery-03.jpg',
        'images/teamwear/joggersSweats/gallery-04.jpg',
        'images/teamwear/joggersSweats/gallery-05.jpg',
        'images/teamwear/joggersSweats/gallery-06.jpg',
        'images/teamwear/joggersSweats/gallery-07.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
