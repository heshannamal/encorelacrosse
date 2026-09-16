<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function mensTops()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Samurai Jacket',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 2,
                'name' => 'Men\'s Pro Reflective Performance Tee - ES',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 3,
                'name' => 'Men\'s Pro Shooter',
                'price' => 30.00,
                'image' => 'menstop/Men_sProLSShooterBack_480x480_7c4d31f1-7050-4a20-8215-448301a20659_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 4,
                'name' => 'Men\'s Pro Long Sleeve Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleevePerformancetee_480x480_efc1e4e4-f357-477d-be10-081cc7b05d80_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 5,
                'name' => 'Panda Vest Without Zippered Pockets',
                'price' => 34.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 6,
                'name' => 'Men\'s Pro Reflective Performance Tee - AIC',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 7,
                'name' => 'Samurai Jacket- White TempTek',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-tops',
            ],
            [
                'id' => 8,
                'name' => 'Men\'s Pro Long Sleeve Sub Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleeveSubPerformancetee_480x480_03fb2a8e-84da-45be-824f-7bada8b646eb_1024x1024.webp',
                'category' => 'mens-tops',
            ],
        ];

        $title = 'Men\'s Tops';
        return view('shop.mens_tops', compact('products', 'title'));
    }

    public function mensBottoms()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Samurai Jacket',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 2,
                'name' => 'Men\'s Pro Reflective Performance Tee - ES',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 3,
                'name' => 'Men\'s Pro Shooter',
                'price' => 30.00,
                'image' => 'menstop/Men_sProLSShooterBack_480x480_7c4d31f1-7050-4a20-8215-448301a20659_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 4,
                'name' => 'Men\'s Pro Long Sleeve Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleevePerformancetee_480x480_efc1e4e4-f357-477d-be10-081cc7b05d80_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 5,
                'name' => 'Panda Vest Without Zippered Pockets',
                'price' => 34.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 6,
                'name' => 'Men\'s Pro Reflective Performance Tee - AIC',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 7,
                'name' => 'Samurai Jacket- White TempTek',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
            [
                'id' => 8,
                'name' => 'Men\'s Pro Long Sleeve Sub Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleeveSubPerformancetee_480x480_03fb2a8e-84da-45be-824f-7bada8b646eb_1024x1024.webp',
                'category' => 'mens-bottoms',
            ],
        ];

        $title = 'Men\'s Bottoms';
        return view('shop.mens_bottoms', compact('products', 'title'));
    }

    public function womensTops()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Samurai Jacket',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 2,
                'name' => 'Men\'s Pro Reflective Performance Tee - ES',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 3,
                'name' => 'Men\'s Pro Shooter',
                'price' => 30.00,
                'image' => 'menstop/Men_sProLSShooterBack_480x480_7c4d31f1-7050-4a20-8215-448301a20659_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 4,
                'name' => 'Men\'s Pro Long Sleeve Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleevePerformancetee_480x480_efc1e4e4-f357-477d-be10-081cc7b05d80_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 5,
                'name' => 'Panda Vest Without Zippered Pockets',
                'price' => 34.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 6,
                'name' => 'Men\'s Pro Reflective Performance Tee - AIC',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 7,
                'name' => 'Samurai Jacket- White TempTek',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-tops',
            ],
            [
                'id' => 8,
                'name' => 'Men\'s Pro Long Sleeve Sub Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleeveSubPerformancetee_480x480_03fb2a8e-84da-45be-824f-7bada8b646eb_1024x1024.webp',
                'category' => 'womens-tops',
            ],
        ];

        $title = 'Women\'s Tops';
        return view('shop.womens_tops', compact('products', 'title'));
    }

    public function womensBottoms()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Samurai Jacket',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 2,
                'name' => 'Men\'s Pro Reflective Performance Tee - ES',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 3,
                'name' => 'Men\'s Pro Shooter',
                'price' => 30.00,
                'image' => 'menstop/Men_sProLSShooterBack_480x480_7c4d31f1-7050-4a20-8215-448301a20659_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 4,
                'name' => 'Men\'s Pro Long Sleeve Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleevePerformancetee_480x480_efc1e4e4-f357-477d-be10-081cc7b05d80_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 5,
                'name' => 'Panda Vest Without Zippered Pockets',
                'price' => 34.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 6,
                'name' => 'Men\'s Pro Reflective Performance Tee - AIC',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 7,
                'name' => 'Samurai Jacket- White TempTek',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
            [
                'id' => 8,
                'name' => 'Men\'s Pro Long Sleeve Sub Shooter',
                'price' => 34.00,
                'image' => 'menstop/Men_sProLongSleeveSubPerformancetee_480x480_03fb2a8e-84da-45be-824f-7bada8b646eb_1024x1024.webp',
                'category' => 'womens-bottoms',
            ],
        ];

        $title = 'Women\'s Bottoms';
        return view('shop.womens_bottoms', compact('products', 'title'));
    }

    public function hats()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Samurai Jacket',
                'price' => 110.00,
                'image' => 'menstop/SamuraiJacket-White_480x480_11a8935f-1f8a-4fc5-9237-daf2e2a76aab_1024x1024.webp',
                'category' => 'hats',
            ],
            [
                'id' => 2,
                'name' => 'Men\'s Pro Reflective Performance Tee - ES',
                'price' => 30.00,
                'image' => 'menstop/Men_sProPerformanceTee-ReflectiveEs_480x480_0c092254-5fb0-4d4d-87ef-e2a6ab1b89f2_1024x1024.webp',
                'category' => 'hats',
            ],
            [
                'id' => 3,
                'name' => 'Men\'s Pro Shooter',
                'price' => 30.00,
                'image' => 'menstop/Men_sProLSShooterBack_480x480_7c4d31f1-7050-4a20-8215-448301a20659_1024x1024.webp',
                'category' => 'hats',
            ],
        ];

        $title = 'Hats';
        return view('shop.hats', compact('products', 'title'));
    }

    public function bags()
    {
        // Hardcoded product data
        $products = [
            [
                'id' => 1,
                'name' => 'Duffle bag',
                'price' => 60.00,
                'image' => 'DuffleBag1Side_28de36c9-866d-410b-b0f7-f30a9591475c_480x480_1_1024x1024.webp',
                'category' => 'bag',
            ],
        ];

        $title = 'Bags';
        return view('shop.bags', compact('products', 'title'));
    }
}