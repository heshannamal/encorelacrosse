@extends('layouts.app')

@section('content')
@php
    $pageHeading = 'Hoodies';
    $formId = 'hoodies';
    $heroImage = 'images/teamwear/landing/teamwear-09.webp';
    $messagePlaceholder = "I'm interested in custom hoodies...";

    $products = [
        [
            'title' => 'CLASSIC HOODIE',
            'designer_notes' => true,
            'description' => 'The Classic Hoodie is the essential fleece item. Universally loved by all, and a staple off field piece for all teams.',
            'features' => [
                'Full Zip option available',
                'Features Kangaroo style pockets',
                'Embellishment options include embroidery, screen print, and patchwork applique',
                'Customized neck tape offers seam free comfort on the neck',
                'Hood with custom tipped drawstring',
                'Available in Fleece and French Terry fabrics',
                'Classic fit item is true to size',
            ],
            'images' => [
                'images/teamwear/hoodies/classic-front.jpg',
                'images/teamwear/hoodies/classic-back.jpg',
                'images/teamwear/hoodies/classic-right.jpg',
                'images/teamwear/hoodies/classic-left.jpg',
            ],
        ],
        [
            'title' => '3 PIECE HOODIE',
            'designer_notes' => true,
            'description' => 'The 3 Piece Hoodie offers multiple panels on body, sleeves and hood to add style and customization options.',
            'features' => [
                'Features Kana style zippered pockets',
                'Embellishment options include embroidery, screen print, and patchwork applique',
                'Customized neck tape offers seam free comfort on the neck',
                'Hood with custom tipped drawstring',
                'Available in Fleece and French Terry fabrics',
                'Classic fit item is true to size',
            ],
            'images' => [
                'images/teamwear/hoodies/three-piece.jpg',
            ],
        ],
        [
            'title' => 'CLASSIC CREWNECK',
            'designer_notes' => true,
            'description' => 'The Classic Crewneck is another staple worthy of the Classic Title.',
            'features' => [
                'Rib knit collar and ActionTek neck tape provide comfort and style',
                'Embellishment options include embroidery, screen print, and patchwork applique',
                'Customizable pocket options include Kangaroo, Kana, Zippered, Standard, or no pockets',
                'Available in Fleece and French Terry fabrics',
                'Classic fit item is true to size',
            ],
            'images' => [
                'images/teamwear/hoodies/crewneck-front.jpg',
                'images/teamwear/hoodies/crewneck-back.jpg',
                'images/teamwear/hoodies/crewneck-right.jpg',
                'images/teamwear/hoodies/crewneck-left.jpg',
            ],
        ],
        [
            'title' => 'BSE HOODIE',
            'designer_notes' => true,
            'description' => "Dubbed BSE for BEST SHIRT EVER! A versatile combination of a lightweight casual tee and hoodie- this piece is our favorite because it's worn year round, on the field, off the field- it goes everywhere you go.",
            'features' => [
                'Embellishment options include sublimation, screen print and embroidery- depending on the fabric selection',
                'Excellent coaches shirt and sideline item',
                'Available in Cotton Tri-Blend, VersaTek and DezTek Heavy fabrics',
                'Fabric options can make the BSE a more athletic or casual piece',
                'Modern fit item is slimmer than a Classic Hoodie',
            ],
            'images' => [
                'images/teamwear/hoodies/bse-front.jpg',
                'images/teamwear/hoodies/bse-back.jpg',
                'images/teamwear/hoodies/bse-right.jpg',
                'images/teamwear/hoodies/bse-left.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/hoodies/customize-01.jpg',
        'images/teamwear/hoodies/customize-02.jpg',
        'images/teamwear/hoodies/customize-03.jpg',
        'images/teamwear/hoodies/customize-04.jpg',
    ];

    $galleryImages = [
        'images/teamwear/hoodies/gallery-01.jpg',
        'images/teamwear/hoodies/gallery-02.jpg',
        'images/teamwear/hoodies/gallery-03.jpg',
        'images/teamwear/hoodies/gallery-04.jpg',
        'images/teamwear/hoodies/gallery-05.jpg',
        'images/teamwear/hoodies/gallery-06.jpg',
        'images/teamwear/hoodies/gallery-07.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
