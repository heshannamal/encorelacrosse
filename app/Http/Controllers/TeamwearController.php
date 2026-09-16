<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamwearController extends Controller
{
    public function allTeamwear()
    {
        // return view for all teamwear
    }

    public function mensGameJerseys()
    {
        $title = 'Men\'s Game Jerseys';
        // return view for men's game jerseys
        return view('teamwear.mensGameJerseys', compact('title'));
    }

    public function mensShorts()
    {
        $title = 'Men\'s Shorts';
        // return view for men's shorts
        return view('teamwear.mensShorts', compact('title'));
    }

    public function mensShooters()
    {
        $title = 'Men\'s Shooters';
        // return view for men's shooters
        return view('teamwear.mensShooterShirts', compact('title'));
    }

    public function mensReversibles()
    {
        $title = 'Men\'s Reversibles';
        // return view for men's reversibles
        return view('teamwear.mensReversibles', compact('title'));
    }

    public function womensRacerbacks()
    {
        $title = 'Women\'s Racerbacks'; 
        // return view for women's racerbacks
        return view('teamwear.womensRacerbacks', compact('title'));
    }

    public function womensShortsKilts()
    {
        $title = 'Women\'s Shorts & Kilts';
        // return view for women's shorts & kilts
        return view('teamwear.womensShortsKilts', compact('title'));
    }

    public function womensShooters()
    {
        $title = 'Women\'s Shooters';
        // return view for women's shooters
        return view('teamwear.womensShooters', compact('title'));
    }

    public function outerwear()
    {
        $title = 'Outerwear';
        // return view for outerwear
        return view('teamwear.outerwear', compact('title'));
    }

    public function hoodies()
    {
        $title = 'Hoodies';
        // return view for hoodies
        return view('teamwear.hoodies', compact('title'));
    }

    public function joggersSweats()
    {
        $title = 'Joggers & Sweats';
        // return view for joggers & sweats
        return view('teamwear.joggersSweats', compact('title'));
    }

    public function lpp()
    {
        $title = 'LPP';
        // return view for LPP
        return view('teamwear.lpp', compact('title'));
    }
}
