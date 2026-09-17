<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternationalController extends Controller
{
    public function sriLanka()
    {
        $title = 'Sri Lanka';
        return view('international.sriLanka', compact('title'));
    }

    public function philippines()
    {
        $title = 'Philippines';
        return view('international.philippines', compact('title'));
    }

    public function ecuador()
    {
        $title = 'Ecuador';
        return view('international.ecuador', compact('title'));
    }

    public function uganda()
    {
        $title = 'Uganda';
        return view('international.uganda', compact('title'));
    }

    public function japan()
    {
        $title = 'Japan';
        return view('international.japan', compact('title'));
    }

    public function berlin()
    {
        $title = 'Berlin';
        return view('international.berlin', compact('title'));
    }

    public function colombia()
    {
        $title = 'Colombia';
        return view('international.colombia', compact('title'));
    }

    public function trinidadAndTobago()
    {
        $title = 'Trinidad & Tobago Lacrosse';
        return view('international.trinidadAndTobago', compact('title'));
    }
}
