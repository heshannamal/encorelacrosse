<?php

namespace App\Http\Controllers;

use App\Services\Encore\ProductApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class StorefrontController extends Controller
{
    public function __construct(protected ProductApiService $products)
    {
    }

    public function index(Request $request)
    {
        try {
            $selectedCategory = $request->filled('selectedCategory')
                ? $request->input('selectedCategory')
                : 5;

            // Search locally after normalization so display_product_name is searchable.
            $response = $this->products->products([
                'selectedCategory' => $selectedCategory,
                'selectedGender' => $request->input('selectedGender'),
                'selectedSport' => $request->input('selectedSport'),
                'selectedStyle' => $request->input('selectedStyle'),
                'search' => null,
            ]);

            if (!($response['success'] ?? false)) {
                throw new RuntimeException($response['message'] ?? 'Unable to load products.');
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

            if ($request->input('sort') === 'price_asc') {
                $products = $products->sortBy('price')->values();
            } elseif ($request->input('sort') === 'price_desc') {
                $products = $products->sortByDesc('price')->values();
            } elseif ($request->input('sort') === 'name_asc') {
                $products = $products->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->values();
            }

            return view('shop.all-products', [
                'products' => $products,
                'mainCategories' => $this->shopMainCategories(),
                'sports' => $this->listFrom(fn () => $this->products->sports(), 'sports'),
                'productCategories' => $this->listFrom(fn () => $this->products->productCategories(), 'product_categories'),
                'apiError' => null,
            ]);
        } catch (Throwable $e) {
            return view('shop.all-products', [
                'products' => collect(),
                'mainCategories' => $this->fallbackCategories(),
                'sports' => [],
                'productCategories' => $this->fallbackStyles(),
                'apiError' => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        try {
            $response = $this->products->product((int) $id);
            if (!($response['success'] ?? false)) {
                abort(404, $response['message'] ?? 'Product not found.');
            }

            $options = $this->products->options((int) $id);

            return view('shop.product', [
                'product' => $this->products->normalizeProduct($response['data'] ?? []),
                'options' => [
                    'sizes' => collect($options['sizes'] ?? data_get($options, 'data.sizes', []))->values(),
                    'colors' => collect($options['colors'] ?? data_get($options, 'data.colors', []))->values(),
                    'combinations' => collect($options['combinations'] ?? data_get($options, 'data.combinations', []))->values(),
                ],
            ]);
        } catch (Throwable $e) {
            abort(404, $e->getMessage());
        }
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
        ])->filter(fn ($value) => $value !== null && $value !== '')->implode(' ');

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
        $categories = collect($this->listFrom(fn () => $this->products->mainCategories(), 'main_categories'))
            ->reject(function ($category) {
                return strcasecmp(trim((string) data_get($category, 'category_name', '')), 'Lifestyle') === 0;
            })
            ->values();

        if (!$categories->contains(fn ($category) => (int) data_get($category, 'id') === 5)) {
            $categories->prepend(['id' => 5, 'category_name' => 'All Apparel']);
        }

        return $categories->all();
    }

    protected function listFrom(callable $callback, string $key): array
    {
        try {
            $response = $callback();
            return $response[$key] ?? data_get($response, 'data.' . $key, data_get($response, 'data', []));
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
