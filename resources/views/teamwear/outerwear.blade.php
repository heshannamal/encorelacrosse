@extends('layouts.app')

@section('content')
@php
    $pageHeading = 'Outerwear';
    $formId = 'outerwear';
    $heroImage = 'images/teamwear/landing/teamwear-09.webp';
    $messagePlaceholder = "I'm interested in custom outerwear...";

    $products = [
        [
            'title' => 'SAMURAI JACKET',
            'designer_notes' => true,
            'description' => "The Samurai Jacket is the Swiss Army knife of jackets. It's functional, durable and stylish on and off the field.",
            'features' => [
                'Patch welt stick loops to carry your stick on your back!',
                'Weather resistant zippers',
                'Multiple pockets, including phone pocket on the chest, and tablet/clipboard pocket on the back',
                'Hood with adjustable elastic cord',
                'TempTek Fabric is both weather resistant and warm. The Samurai jacket is also available in lightweight RipTek fabric.',
                'Modern style fit features a slightly fitted body that runs a half size small',
                'Side zips and snaps allow for additional comfort and customized fit',
            ],
            'images' => [
                'images/teamwear/outerwear/samurai-front.jpg',
                'images/teamwear/outerwear/samurai-back.jpg',
                'images/teamwear/outerwear/samurai-right.jpg',
                'images/teamwear/outerwear/samurai-left.jpg',
            ],
        ],
        [
            'title' => 'PANDA VEST',
            'designer_notes' => true,
            'description' => 'The Panda Vest is the ultimate cold weather Vest. This puffy essential is incredibly comfortable on the sideline or on the way to the field.',
            'features' => [
                'Available in multiple team colors',
                'Custom Embroidery or Applique patch embellishment available',
                'Side vent zipper for comfort and ventilation',
                'Without Zippered Pockets',
                'Lightweight synthetic fill is warm, comfortable and packable. No Pandas or Geese harmed in creating this jacket!',
                'Classic fit is true to size and has room for layering',
            ],
            'images' => [
                'images/teamwear/outerwear/panda-front.jpg',
                'images/teamwear/outerwear/panda-back.jpg',
                'images/teamwear/outerwear/panda-right.jpg',
                'images/teamwear/outerwear/panda-left.jpg',
            ],
        ],
        [
            'title' => 'VALENCIA JACKET',
            'designer_notes' => true,
            'description' => "Distinguished by its unique diamond-shaped paneling, Encore's Valencia Jacket features adjustable strings and a full zip-up for ventilation and comfort in TempTek fabric. Create your own sublimated design to create a modern and athletic appearance on and off the field.",
            'features' => [
                'FloatTek fabric',
                'Logo print on the left',
            ],
            'images' => [
                'images/teamwear/outerwear/valencia-front.jpg',
                'images/teamwear/outerwear/valencia-back.jpg',
                'images/teamwear/outerwear/valencia-right.jpg',
                'images/teamwear/outerwear/valencia-left.jpg',
            ],
        ],
    ];

    $customizeImages = [
        'images/teamwear/outerwear/customize-01.jpg',
        'images/teamwear/outerwear/customize-02.jpg',
        'images/teamwear/outerwear/customize-03.jpg',
        'images/teamwear/outerwear/customize-04.jpg',
    ];

    $galleryImages = [
        'images/teamwear/outerwear/gallery-01.jpg',
        'images/teamwear/outerwear/gallery-02.jpg',
        'images/teamwear/outerwear/gallery-03.jpg',
        'images/teamwear/outerwear/gallery-04.jpg',
        'images/teamwear/outerwear/gallery-05.jpg',
        'images/teamwear/outerwear/gallery-06.jpg',
        'images/teamwear/outerwear/gallery-07.jpg',
    ];
@endphp

@include('teamwear.partials.themedProductPage')
@endsection
