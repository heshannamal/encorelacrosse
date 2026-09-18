<?php

namespace App\Http\Controllers;

use App\Services\Encore\ProductApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class ShopController extends Controller
{
    public function __construct(protected ProductApiService $products)
    {
    }

    public function mensTops(Request $request)
    {
        return $this->categoryPage(
            $request,
            'shop.mens_tops',
            "Men's Tops",
            11,
            'Men',
            'shop.mens-tops'
        );
    }

    public function mensBottoms(Request $request)
    {
        /*
         * The exact Encore style ID for this broad legacy page is not yet
         * confirmed. Keep the fallback explicit here so it is easy to change.
         */
        return $this->categoryPage(
            $request,
            'shop.mens_bottoms',
            "Men's Bottoms",
            20,
            'Men',
            'shop.mens-bottoms'
        );
    }

    public function womensTops(Request $request)
    {
        return $this->categoryPage(
            $request,
            'shop.womens_tops',
            "Women's Tops",
            11,
            'Women',
            'shop.womens-tops'
        );
    }

    public function womensBottoms(Request $request)
    {
        /*
         * The exact Encore style ID for this broad legacy page is not yet
         * confirmed. Keep the fallback explicit here so it is easy to change.
         */
        return $this->categoryPage(
            $request,
            'shop.womens_bottoms',
            "Women's Bottoms",
            20,
            'Women',
            'shop.womens-bottoms'
        );
    }

    public function hats(Request $request)
    {
        return $this->categoryPage(
            $request,
            'shop.hats',
            'Hats',
            17,
            null,
            'shop.hats'
        );
    }

    public function bags(Request $request)
    {
        return $this->categoryPage(
            $request,
            'shop.bags',
            'Bags',
            1,
            null,
            'shop.bags'
        );
    }

    protected function categoryPage(
        Request $request,
        string $view,
        string $title,
        int $defaultStyleId,
        ?string $defaultGender,
        string $filterRouteName
    ) {
        /*
         * Keep the legacy page URL and hero, but load its products from the
         * same Encore API used by Alcatraz Outlaws.
         *
         * A filter is only given its page default when that query parameter is
         * completely absent. Choosing "All Styles" or "All" gender therefore
         * really clears the page default instead of immediately restoring it.
         */
        $selectedCategory = $request->has('selectedCategory')
            ? $request->input('selectedCategory')
            : 5;

        $selectedStyle = $request->has('selectedStyle')
            ? $request->input('selectedStyle')
            : $defaultStyleId;

        $selectedGender = $request->has('selectedGender')
            ? $request->input('selectedGender')
            : $defaultGender;

        $selectedSport = $request->input('selectedSport');

        try {
            $response = $this->products->products([
                'selectedCategory' => $selectedCategory,
                'selectedGender' => $selectedGender,
                'selectedSport' => $selectedSport,
                'selectedStyle' => $selectedStyle,
                // Search after normalizeProduct() so display names remain searchable.
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

            $search = trim((string) $request->input('search', ''));

            if ($search !== '') {
                $products = $products
                    ->filter(fn ($product) => $this->matchesStorefrontSearch($product, $search))
                    ->values();
            }

            $products = $this->sortProducts(
                $products,
                (string) $request->input('sort', '')
            );

            $mainCategories = $this->shopMainCategories();
            $sports = $this->listFrom(
                fn () => $this->products->sports(),
                'sports'
            );
            $productCategories = $this->listFrom(
                fn () => $this->products->productCategories(),
                'product_categories'
            );

            if (empty($productCategories)) {
                $productCategories = $this->fallbackStyles();
            }

            return view($view, [
                'products' => $products,
                'title' => $title,
                'mainCategories' => $mainCategories,
                'sports' => $sports,
                'productCategories' => $productCategories,
                'apiError' => null,
                'defaultStyleId' => $defaultStyleId,
                'defaultGender' => $defaultGender,
                'filterRouteName' => $filterRouteName,
            ]);
        } catch (Throwable $e) {
            return view($view, [
                'products' => collect(),
                'title' => $title,
                'mainCategories' => $this->fallbackCategories(),
                'sports' => [],
                'productCategories' => $this->fallbackStyles(),
                'apiError' => $e->getMessage(),
                'defaultStyleId' => $defaultStyleId,
                'defaultGender' => $defaultGender,
                'filterRouteName' => $filterRouteName,
            ]);
        }
    }

    protected function sortProducts($products, string $sort)
    {
        return match ($sort) {
            'price_asc' => $products->sortBy('price')->values(),
            'price_desc' => $products->sortByDesc('price')->values(),
            'name_asc' => $products->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values(),
            default => $products->values(),
        };
    }

    protected function matchesStorefrontSearch(array $product, string $search): bool
    {
        $raw = is_array($product['raw'] ?? null) ? $product['raw'] : [];

        $haystack = collect([
            $product['name'] ?? null,
            data_get($raw, 'display_product_name'),
            data_get($raw, 'product_display_detail.product_name'),
            data_get($raw, 'show_in_catalog_name'),
            data_get($raw, 'product_name'),
            data_get($raw, 'sub_product_name'),
            data_get($raw, 'sub_product_no'),
            data_get($raw, 'pattern_code'),
            data_get($raw, 'product_details.show_in_catalog_name'),
            data_get($raw, 'product_details.product_name'),
            data_get($raw, 'product_details.product_no'),
            data_get($raw, 'product_details.pattern_code'),
        ])
            ->filter(fn ($value) => $value !== null && $value !== '')
            ->implode(' ');

        $normalizedHaystack = $this->normalizeSearchText($haystack);
        $normalizedSearch = $this->normalizeSearchText($search);

        if ($normalizedSearch === '') {
            return true;
        }

        $terms = preg_split('/\s+/u', $normalizedSearch, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        foreach ($terms as $term) {
            if (!str_contains($normalizedHaystack, $term)) {
                return false;
            }
        }

        return true;
    }

    protected function normalizeSearchText(string $value): string
    {
        $value = Str::lower(trim($value));
        $value = preg_replace('/[^\pL\pN]+/u', ' ', $value) ?? $value;

        return trim(preg_replace('/\s+/u', ' ', $value) ?? $value);
    }

    protected function shopMainCategories(): array
    {
        $categories = collect(
            $this->listFrom(
                fn () => $this->products->mainCategories(),
                'main_categories'
            )
        )
            ->reject(function ($category) {
                return strcasecmp(
                    trim((string) data_get($category, 'category_name', '')),
                    'Lifestyle'
                ) === 0;
            })
            ->values();

        if ($categories->isEmpty()) {
            return $this->fallbackCategories();
        }

        if (!$categories->contains(
            fn ($category) => (int) data_get($category, 'id') === 5
        )) {
            $categories->prepend([
                'id' => 5,
                'category_name' => 'All Apparel',
            ]);
        }

        return $categories->all();
    }

    protected function listFrom(callable $callback, string $key): array
    {
        try {
            $response = $callback();

            return $response[$key]
                ?? data_get(
                    $response,
                    'data.' . $key,
                    data_get($response, 'data', [])
                );
        } catch (Throwable $e) {
            return [];
        }
    }

    protected function fallbackCategories(): array
    {
        return [
            ['id' => 5, 'category_name' => 'All Apparel'],
            ['id' => 1, 'category_name' => 'Teamwear'],
            ['id' => 2, 'category_name' => 'Training'],
        ];
    }

    protected function fallbackStyles(): array
    {
        return [
            ['id' => 1, 'product_category_name' => 'Bags'],
            ['id' => 21, 'product_category_name' => 'Compression & Leggings'],
            ['id' => 23, 'product_category_name' => 'Compression Bottoms'],
            ['id' => 22, 'product_category_name' => 'Compression Tops'],
            ['id' => 20, 'product_category_name' => 'Game Uniforms'],
            ['id' => 17, 'product_category_name' => 'Hats'],
            ['id' => 7, 'product_category_name' => 'Hoodies & Fleece'],
            ['id' => 5, 'product_category_name' => 'Outerwear'],
            ['id' => 2, 'product_category_name' => 'Pants & Sweats'],
            ['id' => 8, 'product_category_name' => 'Shorts & Skirts'],
            ['id' => 9, 'product_category_name' => 'Socks'],
            ['id' => 11, 'product_category_name' => 'Tops'],
            ['id' => 3, 'product_category_name' => 'Underwear & Bras'],
        ];
    }
}
