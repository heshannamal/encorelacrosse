<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function teamStores()
    {
        $title = 'Team Stores';
        return view('custom.teamStores', compact('title'));
    }

    public function customGraphicDesign()
    {
        $title = 'Custom Graphic Design';
        return view('custom.customGraphicDesign', compact('title'));
    }

    public function sizingCharts()
    {
        $title = 'Sizing Charts';
        return view('custom.sizingCharts', compact('title'));
    }

    public function fabric()
    {
        $title = 'Fabric';
        return view('custom.fabric', compact('title'));
    }

    public function embellishment()
    {
        $title = 'Embellishment';
        return view('custom.embellishment', compact('title'));
    }
}
