<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function battleOfTheBay()
    {
        $title = 'Battle of the Bay';
        return view('events.battleOfTheBay', compact('title'));
    }

    public function impact10Showcase()
    {
        $title = 'Impact10 Showcase';
        return view('events.impact10Showcase', compact('title'));
    }

    public function hawaiiYouthLacrosseClassic()
    {
        $title = 'Hawaii Youth Lacrosse Classic';
        return view('events.hawaiiYouthLacrosseClassic', compact('title'));
    }

    public function lasVegasLacrosseShowcase()
    {
        $title = 'Las Vegas Lacrosse Showcase';
        return view('events.lasVegasLacrosseShowcase', compact('title'));
    }

    public function kingsShowcase()
    {
        $title = 'King\'s Showcase';
        return view('events.kingsShowcase', compact('title'));
    }

    public function buffaloWingsBoxLacrosse()
    {
        $title = 'Buffalo Wings Box Lacrosse';
        return view('events.buffaloWingsBoxLacrosse', compact('title'));
    }
}
