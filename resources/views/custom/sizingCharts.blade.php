@extends('layouts.app')

@section('content')
@php
// Image Assets Configuration
$hero_bg = asset('images/custom/sizing/hero-sizing-fit.webp');
$intro_image = asset('images/custom/sizing/sizing-intro.webp');
$bottom_image = asset('images/custom/sizing/sizing-bottom.jpeg');

// Bottom Grid Images
$grid_img_design = asset('images/grid/custom-graphic-design.jpg');
$grid_img_shop = asset('images/grid/shop-lifestyle.jpg');
$grid_img_team = asset('images/grid/team-store.jpg');
$grid_img_embellishment = asset('images/grid/embellishment.jpg');
$grid_img_sizing = asset('images/grid/sizing-guidelines.jpg');
$grid_img_fabric = asset('images/grid/fabric.jpg');
@endphp

<style>
    /* Font Imports matching original */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@300;400;500;700&display=swap');

    .sizing-page {
        font-family: 'Open Sans', sans-serif;
        color: #333;
        overflow-x: hidden;
    }
    .sizing-page h2,
    .sizing-page .btn {
        font-family: 'Oswald', sans-serif;
        text-transform: uppercase;
    }
</style>
<div class="sizing-page">
    {{-- Hero Section --}}
    <section class="position-relative w-100 d-flex align-items-center justify-content-center"
        style="background-image: url('{{ $hero_bg }}'); background-size: cover; background-position: center; min-height: 400px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
        <div class="position-relative z-1 text-center">
            <h2 class="text-white">SIZING & FIT</h2>
        </div>
    </section>

    <section class="container py-5">

        {{-- Intro Image --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center">
                <img src="{{ $intro_image }}" alt="Sizing Intro" class="img-fluid">
            </div>
        </div>

        {{-- Men's Sizes --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4 text-uppercase">Men's Sizes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-start">Size</th>
                                <th scope="col">XS</th>
                                <th scope="col">S</th>
                                <th scope="col">M</th>
                                <th scope="col">L</th>
                                <th scope="col">XL</th>
                                <th scope="col">XXL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-start">Height</th>
                                <td>5' 2" - 5' 3"</td>
                                <td>5' 4" - 5' 6"</td>
                                <td>5' 7" - 5' 10"</td>
                                <td>5' 11"- 6' 1"</td>
                                <td>6' 1" - 6' 3”</td>
                                <td>6' 4" +</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Weight</th>
                                <td>110 - 130 lbs</td>
                                <td>120 - 140 lbs</td>
                                <td>140 - 160 lbs</td>
                                <td>160 - 180 lbs</td>
                                <td>180 - 210 lbs</td>
                                <td>210 lbs +</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Chest Size</th>
                                <td>32 - 34</td>
                                <td>34 - 36</td>
                                <td>37 - 40</td>
                                <td>41 - 44</td>
                                <td>45 - 48</td>
                                <td>49 - 52</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Waist Size</th>
                                <td>27 - 28</td>
                                <td>28 - 29</td>
                                <td>30 - 32</td>
                                <td>33 - 36</td>
                                <td>37 - 40</td>
                                <td>42 - 44</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Women's Sizes --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4 text-uppercase">Women's Sizes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th></th>
                                <th scope="col">XS</th>
                                <th scope="col">S</th>
                                <th scope="col">M</th>
                                <th scope="col">L</th>
                                <th scope="col">XL</th>
                                <th scope="col">XXL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-start">SIZE</th>
                                <td>0 - 2</td>
                                <td>4 - 6</td>
                                <td>8 - 10</td>
                                <td>12 - 14</td>
                                <td>16</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">BUST</th>
                                <td>31 - 33</td>
                                <td>33 1/2 - 35 1/2</td>
                                <td>36 - 38</td>
                                <td>38 1/2 - 40 1/2</td>
                                <td>41 - 43</td>
                                <td>44 - 46</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">WAIST</th>
                                <td>23 - 25</td>
                                <td>25 1/2 - 27 1/2</td>
                                <td>28 - 30</td>
                                <td>30 1/2 - 32 1/2</td>
                                <td>33 - 35</td>
                                <td>36 - 38</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">HIP</th>
                                <td>33 - 35</td>
                                <td>35 1/2 - 37 1/2</td>
                                <td>38 - 40</td>
                                <td>40 1/2 - 42 1/2</td>
                                <td>43 - 45</td>
                                <td>46 - 48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Youth Sizes (Split Row) --}}
        <div class="row mb-5">
            {{-- Boy's Youth --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="text-center mb-4 text-uppercase">Boy's Youth Sizes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-start">Size</th>
                                <th scope="col">YS</th>
                                <th scope="col">YM</th>
                                <th scope="col">YL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-start">Height</th>
                                <td>4' - 4' 4"</td>
                                <td>4' 5" - 4' 8"</td>
                                <td>4' 9" - 5' 1"</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Weight</th>
                                <td>60 - 80 lbs</td>
                                <td>80 - 100 lbs</td>
                                <td>100 - 120 lbs</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">T-shirt/Pant Size</th>
                                <td>8</td>
                                <td>10 - 12</td>
                                <td>14 - 16</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Chest Size</th>
                                <td>26 - 28</td>
                                <td>28 - 30</td>
                                <td>30 - 32</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Waist Size</th>
                                <td>23 - 24</td>
                                <td>25 - 26</td>
                                <td>26 - 27</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Girl's Youth --}}
            <div class="col-lg-6">
                <h2 class="text-center mb-4 text-uppercase">Girl's Youth Sizes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-start">Size</th>
                                <th scope="col">YS</th>
                                <th scope="col">YM</th>
                                <th scope="col">YL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-start">Height</th>
                                <td>3' 6" - 4'</td>
                                <td>4' - 4' 4"</td>
                                <td>4' 5" - 4' 8"</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Weight</th>
                                <td>40 - 60 lbs</td>
                                <td>60 - 80 lbs</td>
                                <td>80 - 100 lbs</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">T-shirt/Pant Size</th>
                                <td>4 - 6</td>
                                <td>8</td>
                                <td>10 - 12</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Chest Size</th>
                                <td>23 - 25</td>
                                <td>26 - 28</td>
                                <td>28 - 30</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Waist Size</th>
                                <td>20 - 23</td>
                                <td>23 - 24</td>
                                <td>25 - 26</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Socks --}}
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="text-center mb-4 text-uppercase">Socks</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-start">Size</th>
                                <th></th>
                                <th scope="col">XS</th>
                                <th scope="col">S</th>
                                <th scope="col">M</th>
                                <th scope="col">L</th>
                                <th scope="col">XL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="text-start">Men's</th>
                                <td>Shoe Size</td>
                                <td>3 - 5</td>
                                <td>5 - 7</td>
                                <td>7 - 9.5</td>
                                <td>9.5 - 12.5</td>
                                <td>12.5 - 16</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">Women's</th>
                                <td>Shoe Size</td>
                                <td>4 - 6</td>
                                <td>6 - 8</td>
                                <td>8 - 10.5</td>
                                <td>10.5 - 13</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>

    <section>
        {{-- Bottom Image --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center">
                <img src="{{ $bottom_image }}" alt="Sizing Detail" class="img-fluid-w-full">
            </div>
        </div>
    </section>

    <!-- {{-- Bottom Navigation Grid --}}
<section class="container-fluid px-2 mb-5">
    <div class="row g-1">
        {{-- Grid Item 1 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden group-hover-container">
                <img src="{{ $grid_img_design }}" alt="Custom Graphic Design" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">CUSTOM GRAPHIC DESIGN</a>
                </div>
            </div>
        </div>

        {{-- Grid Item 2 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden">
                <img src="{{ $grid_img_shop }}" alt="Shop Lifestyle Apparel" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">SHOP LIFESTYLE APPAREL</a>
                </div>
            </div>
        </div>

        {{-- Grid Item 3 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden">
                <img src="{{ $grid_img_team }}" alt="Team Store" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">TEAM STORE</a>
                </div>
            </div>
        </div>

        {{-- Grid Item 4 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden">
                <img src="{{ $grid_img_embellishment }}" alt="Embellishment Types" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">EMBELLISHMENT TYPES</a>
                </div>
            </div>
        </div>

        {{-- Grid Item 5 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden">
                <img src="{{ $grid_img_sizing }}" alt="Sizing Guidelines" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">SIZING GUIDELINES</a>
                </div>
            </div>
        </div>

        {{-- Grid Item 6 --}}
        <div class="col-6 col-md-4">
            <div class="position-relative overflow-hidden">
                <img src="{{ $grid_img_fabric }}" alt="Fabric" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 300px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-25">
                    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 border-2">FABRIC</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
</div>
@endsection