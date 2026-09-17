<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamwearController extends Controller
{
    public function allTeamwear()
    {
        $title = 'Teamwear';

        $hero = [
            'image' => 'images/teamwear/landing/teamwear-02.webp',
            'title' => 'ENCORE Custom team apparel',
            'subtitle' => 'HOW YOU LOOK. HOW YOU FEEL. HOW YOU PERFORM.',
        ];

        $mens = [
            [
                'label' => 'Game Jerseys',
                'image' => 'images/teamwear/landing/teamwear-03.webp',
                'url' => route('teamwear.mensGameJerseys'),
            ],
            [
                'label' => 'Shorts',
                'image' => 'images/teamwear/landing/teamwear-04.webp',
                'url' => route('teamwear.mensShorts'),
            ],
            [
                'label' => 'Shooters',
                'image' => 'images/teamwear/landing/teamwear-05.webp',
                'url' => route('teamwear.mensShooters'),
            ],
            [
                'label' => 'Reversibles',
                'image' => 'images/teamwear/landing/teamwear-06.webp',
                'url' => route('teamwear.mensReversibles'),
            ],
        ];

        $womensHero = 'images/teamwear/landing/teamwear-07.webp';

        $womens = [
            [
                'label' => 'Game Jerseys',
                'image' => 'images/teamwear/landing/women-game-jerseys.webp',
                'url' => route('teamwear.womensRacerbacks'),
            ],
            [
                'label' => 'Kilt & Short',
                'image' => 'images/teamwear/landing/women-kilt-short.webp',
                'url' => route('teamwear.womensShortsKilts'),
            ],
            [
                'label' => 'Shooters',
                'image' => 'images/teamwear/landing/women-shooters.webp',
                'url' => route('teamwear.womensShooters'),
            ],
            [
                'label' => 'Racerbacks',
                'image' => 'images/teamwear/landing/women-racerbacks.webp',
                'url' => route('teamwear.womensRacerbacks'),
            ],
        ];

        $offFieldHero = 'images/teamwear/landing/teamwear-09.webp';

        $offField = [
            [
                'label' => 'Joggers & Sweats',
                'image' => 'images/teamwear/landing/teamwear-10.webp',
                'url' => route('teamwear.joggersSweats'),
            ],
            [
                'label' => 'Outerwear',
                'image' => 'images/teamwear/landing/teamwear-11.webp',
                'url' => route('teamwear.outerwear'),
            ],
            [
                'label' => 'Hoodies & Fleece',
                'image' => 'images/teamwear/landing/teamwear-12.webp',
                'url' => route('teamwear.hoodies'),
            ],
        ];

        $accessoriesHero = 'images/teamwear/landing/teamwear-13.webp';

        $accessories = [
            'featured' => [
                'label' => 'LPP',
                'image' => 'images/teamwear/landing/teamwear-14.webp',
                'url' => route('teamwear.lpp'),
            ],
            'grid' => [
                [
                    'label' => 'Hats',
                    'image' => 'images/teamwear/landing/teamwear-15.webp',
                    'url' => route('shop.hats'),
                ],
                [
                    'label' => 'Head Bands',
                    'image' => 'images/teamwear/landing/teamwear-16.webp',
                    'url' => '#',
                ],
                [
                    'label' => 'Socks',
                    'image' => 'images/teamwear/landing/teamwear-17.webp',
                    'url' => '#',
                ],
                [
                    'label' => 'Bags',
                    'image' => 'images/teamwear/landing/teamwear-18.webp',
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
