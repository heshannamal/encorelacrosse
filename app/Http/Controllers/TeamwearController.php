<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamwearController extends Controller
{
    public function allTeamwear()
    {
        $title = 'Teamwear';

        $hero = [
            'image' => 'https://ucarecdn.com/553b1d9c-f350-476d-8047-674ca3ff7b67/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-02.JPG',
            'title' => 'ENCORE Custom team apparel',
            'subtitle' => 'HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.',
        ];

        $mens = [
            [
                'label' => 'Game Jerseys',
                'image' => 'https://ucarecdn.com/534daafc-c3a3-4295-a5d5-05efa9c80cb9/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-03.JPG',
                'url' => route('teamwear.mensGameJerseys'),
            ],
            [
                'label' => 'Shorts',
                'image' => 'https://ucarecdn.com/71d35f85-9bb0-4a7c-a465-4e0178d9bc1b/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-04.JPG',
                'url' => route('teamwear.mensShorts'),
            ],
            [
                'label' => 'Shooters',
                'image' => 'https://ucarecdn.com/c201e2f9-f1cb-4224-98cf-783f2c7f75f5/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-05.JPG',
                'url' => route('teamwear.mensShooters'),
            ],
            [
                'label' => 'Reversibles',
                'image' => 'https://ucarecdn.com/4a74e6ee-7e04-4159-9e99-151a919ed033/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-06.JPG',
                'url' => route('teamwear.mensReversibles'),
            ],
        ];

        $womensHero = 'https://ucarecdn.com/43195a3f-d2b7-45e8-be91-855693a4d1e5/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-07.JPG';

        $womens = [
            [
                'label' => 'Game Jerseys',
                'image' => 'https://ucarecdn.com/ee5469a5-292b-44c0-9f7b-660fadc54f62/-/format/auto/-/preview/3000x3000/-/quality/lighter/2.jpg',
                'url' => route('teamwear.womensRacerbacks'),
            ],
            [
                'label' => 'Kilt & Short',
                'image' => 'https://ucarecdn.com/dab3aa56-c157-4adf-b803-754b604fabdc/-/format/auto/-/preview/3000x3000/-/quality/lighter/1.jpg',
                'url' => route('teamwear.womensShortsKilts'),
            ],
            [
                'label' => 'Shooters',
                'image' => 'https://ucarecdn.com/0c3ad21e-4a3a-4f49-8b78-58d793b1d8cb/-/format/auto/-/preview/3000x3000/-/quality/lighter/4.jpg',
                'url' => route('teamwear.womensShooters'),
            ],
            [
                'label' => 'Racerbacks',
                'image' => 'https://ucarecdn.com/c346acaf-af41-4cbd-bb26-b4d3f0c46691/-/format/auto/-/preview/3000x3000/-/quality/lighter/3.jpg',
                'url' => route('teamwear.womensRacerbacks'),
            ],
        ];

        $offFieldHero = 'https://ucarecdn.com/c9f439ba-e0dd-4846-9494-45bc1730d19c/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-09.JPG';

        $offField = [
            [
                'label' => 'Joggers & Sweats',
                'image' => 'https://ucarecdn.com/f8af6778-be75-4eab-8905-0f6ab985b42d/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-10.JPG',
                'url' => route('teamwear.joggersSweats'),
            ],
            [
                'label' => 'Outerwear',
                'image' => 'https://ucarecdn.com/6e660286-b316-4b06-8821-31ce76a48370/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-11.JPG',
                'url' => route('teamwear.outerwear'),
            ],
            [
                'label' => 'Hoodies & Fleece',
                'image' => 'https://ucarecdn.com/1aceaf18-165d-471c-bbb7-d8f68122cdf8/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-12.JPG',
                'url' => route('teamwear.hoodies'),
            ],
        ];

        $accessoriesHero = 'https://ucarecdn.com/8f10c7ce-b1c7-4dfe-8687-5751c8032690/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-13.JPG';

        $accessories = [
            'featured' => [
                'label' => 'LPP',
                'image' => 'https://ucarecdn.com/53a30f39-4e33-4100-b1bd-a04966e81108/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-14.JPG',
                'url' => route('teamwear.lpp'),
            ],
            'grid' => [
                [
                    'label' => 'Hats',
                    'image' => 'https://ucarecdn.com/2ce5aab7-100b-4d40-8a27-080f50898069/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-15.JPG',
                    'url' => route('shop.hats'),
                ],
                [
                    'label' => 'Head Bands',
                    'image' => 'https://ucarecdn.com/7ee40ba6-9cbc-453b-b0b3-414db1e423e3/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-16.JPG',
                    'url' => '#',
                ],
                [
                    'label' => 'Socks',
                    'image' => 'https://ucarecdn.com/d0702132-82bc-4767-bf6a-f697f464c82e/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-17.JPG',
                    'url' => '#',
                ],
                [
                    'label' => 'Bags',
                    'image' => 'https://ucarecdn.com/3cddd4b3-c821-4359-b5c7-029e8187b7fe/-/format/auto/-/preview/3000x3000/-/quality/lighter/Teamwear-18.JPG',
                    'url' => route('shop.bags'),
                ],
            ],
        ];

        return view('teamwear.index', compact(
            'title',
            'hero',
            'mens',
            'womensHero',
            'womens',
            'offFieldHero',
            'offField',
            'accessoriesHero',
            'accessories'
        ));
    }

    public function mensGameJerseys()
    {
        $title = 'Men\'s Game Jerseys';
        return view('teamwear.mensGameJerseys', compact('title'));
    }

    public function mensShorts()
    {
        $title = 'Men\'s Shorts';
        return view('teamwear.mensShorts', compact('title'));
    }

    public function mensShooters()
    {
        $title = 'Men\'s Shooters';
        return view('teamwear.mensShooterShirts', compact('title'));
    }

    public function mensReversibles()
    {
        $title = 'Men\'s Reversibles';
        return view('teamwear.mensReversibles', compact('title'));
    }

    public function womensRacerbacks()
    {
        $title = 'Women\'s Racerbacks';
        return view('teamwear.womensRacerbacks', compact('title'));
    }

    public function womensShortsKilts()
    {
        $title = 'Women\'s Shorts & Kilts';
        return view('teamwear.womensShortsKilts', compact('title'));
    }

    public function womensShooters()
    {
        $title = 'Women\'s Shooters';
        return view('teamwear.womensShooters', compact('title'));
    }

    public function outerwear()
    {
        $title = 'Outerwear';
        return view('teamwear.outerwear', compact('title'));
    }

    public function hoodies()
    {
        $title = 'Hoodies';
        return view('teamwear.hoodies', compact('title'));
    }

    public function joggersSweats()
    {
        $title = 'Joggers & Sweats';
        return view('teamwear.joggersSweats', compact('title'));
    }

    public function lpp()
    {
        $title = 'LPP';
        return view('teamwear.lpp', compact('title'));
    }
}
