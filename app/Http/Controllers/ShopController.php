<?php

namespace App\Http\Controllers;

use App\Services\Encore\ProductApiService;
use RuntimeException;
use Throwable;

class ShopController extends Controller
{
    public function __construct(protected ProductApiService $products)
    {
    }

    public function mensTops()
    {
        return $this->categoryPage(
            'shop.mens_tops',
            "Men's Tops",
            11,
            'Men'
        );
    }

    public function mensBottoms()
    {
        // Change this style ID later if Encore confirms a different one.
        return $this->categoryPage(
            'shop.mens_bottoms',
            "Men's Bottoms",
            20,
            'Men'
        );
    }

    public function womensTops()
    {
        return $this->categoryPage(
            'shop.womens_tops',
            "Women's Tops",
            11,
            'Women'
        );
    }

    public function womensBottoms()
    {
        // Change this style ID later if Encore confirms a different one.
        return $this->categoryPage(
            'shop.womens_bottoms',
            "Women's Bottoms",
            20,
            'Women'
        );
    }

    public function hats()
    {
        return $this->categoryPage(
            'shop.hats',
            'Hats',
            17,
            null
        );
    }

    public function bags()
    {
        return $this->categoryPage(
            'shop.bags',
            'Bags',
            1,
            null
        );
    }

    /**
     * Load only the products for the current legacy Shop page.
     *
     * The page keeps its existing URL, hero, and product-card theme.
     * Filtering is fixed in the controller; there is no customer-facing
     * filter toolbar on these pages.
     */
    protected function categoryPage(
        string $view,
        string $title,
        int $styleId,
        ?string $gender
    ) {
        try {
            $response = $this->products->products([
                'selectedCategory' => 5,
                'selectedGender' => $gender,
                'selectedSport' => null,
                'selectedStyle' => $styleId,
                'search' => null,
            ]);

            if (!($response['success'] ?? false)) {
                throw new RuntimeException(
                    $response['message'] ?? 'Unable to load products.'
                );
            }

            $products = collect($response['data'] ?? [])
                ->map(fn ($item) => $this->products->normalizeProduct($item))
                ->filter(fn ($product) => !empty($product['id']))
                ->values();

            return view($view, [
                'products' => $products,
                'title' => $title,
                'apiError' => null,
            ]);
        } catch (Throwable $e) {
            return view($view, [
                'products' => collect(),
                'title' => $title,
                'apiError' => $e->getMessage(),
            ]);
        }
    }
}
