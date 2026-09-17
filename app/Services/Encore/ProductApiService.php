<?php

namespace App\Services\Encore;

use Illuminate\Support\Facades\Log;

class ProductApiService
{
    public function __construct(protected EncoreApiClient $api)
    {
    }

    public function mainCategories(): array
    {
        return $this->api->get('v1/get_main_categories');
    }

    public function sports(): array
    {
        return $this->api->get('v1/get_sports');
    }

    public function productCategories(): array
    {
        return $this->api->get('v1/get_product_categories');
    }

    public function products(array $filters = []): array
    {
        $primaryQuery = array_filter([
            'selectedCategory' => $filters['selectedCategory'] ?? null,
            'selectedGender' => $filters['selectedGender'] ?? null,
            'selectedSport' => $filters['selectedSport'] ?? null,
            'selectedStyle' => $filters['selectedStyle'] ?? null,
            'search' => $filters['search'] ?? null,
        ], fn ($value) => $value !== null && $value !== '');

        $primary = $this->api->get('v1/get_products', $primaryQuery);

        if ($primary['success'] ?? false) {
            return $primary;
        }

        $status = (int) ($primary['_http_status'] ?? 0);
        if ($status > 0 && $status < 500) {
            return $primary;
        }

        Log::warning('Encore get_products failed; using /v1/products fallback.', [
            'status' => $status ?: null,
        ]);

        $selectedCategory = $filters['selectedCategory'] ?? null;
        $fallbackQuery = array_filter([
            'search' => $filters['search'] ?? null,
            'category_id' => ($selectedCategory && (string) $selectedCategory !== '5')
                ? $selectedCategory
                : null,
            'per_page' => 500,
        ], fn ($value) => $value !== null && $value !== '');

        $fallback = $this->api->get('v1/products', $fallbackQuery);

        if (!($fallback['success'] ?? false)) {
            return $primary;
        }

        $items = data_get($fallback, 'data.data');
        if (!is_array($items)) {
            $items = data_get($fallback, 'data', []);
        }
        $items = is_array($items) ? $items : [];

        $items = collect($items)
            ->filter(fn ($item) => $this->matchesFallbackFilters($item, $filters))
            ->values()
            ->all();

        return [
            'success' => true,
            'sales_channel_id' => $fallback['sales_channel_id'] ?? null,
            'data' => $items,
            '_http_status' => (int) ($fallback['_http_status'] ?? 200),
            '_fallback_endpoint' => 'v1/products',
        ];
    }

    public function product(int $id): array
    {
        $response = $this->api->get('v1/products/' . $id);

        if (!($response['success'] ?? false)) {
            return $response;
        }

        $detail = $this->asArray($response['data'] ?? []);

        if (!$this->hasCustomDisplayFields($detail)) {
            try {
                $catalogue = $this->products();

                if ($catalogue['success'] ?? false) {
                    $displayProduct = collect($catalogue['data'] ?? [])->first(function ($item) use ($id) {
                        $item = $this->asArray($item);
                        return (int) $this->first($item, ['id', 'sub_product_id', 'product_id'], 0) === $id;
                    });

                    if ($displayProduct) {
                        $detail = $this->mergeCustomDisplayFields($detail, $this->asArray($displayProduct));
                    }
                }
            } catch (\Throwable $e) {
                Log::warning('Unable to enrich Encore product detail with display overrides.', [
                    'product_id' => $id,
                    'message' => $e->getMessage(),
                ]);
            }
        }

        $response['data'] = $detail;
        return $response;
    }

    public function options(int $id): array
    {
        return $this->api->get('v1/get_product_options/' . $id);
    }

    public function stockForCombination(int $productId, int $sizeId, ?int $colorId): int
    {
        $response = $this->options($productId);
        $combinations = collect($response['combinations'] ?? data_get($response, 'data.combinations', []));

        $match = $combinations->first(function ($item) use ($sizeId, $colorId) {
            $itemSize = (int) data_get($item, 'size_id');
            $itemColor = data_get($item, 'color_id');
            $itemColor = ($itemColor === null || $itemColor === '') ? null : (int) $itemColor;
            return $itemSize === $sizeId && $itemColor === $colorId;
        });

        return max(0, (int) data_get($match, 'stock_qty', 0));
    }

    public function normalizeProduct($item): array
    {
        $item = $this->asArray($item);
        $id = (int) $this->first($item, ['id', 'sub_product_id', 'product_id'], 0);

        $name = (string) $this->first($item, [
            'display_product_name',
            'product_display_detail.product_name',
            'display_name',
            'show_in_catalog_name',
            'product_name',
            'sub_product_name',
            'name',
            'product_details.show_in_catalog_name',
            'product_details.product_name',
        ], 'Product');

        $price = (float) $this->first($item, [
            'display_product_price',
            'product_display_detail.product_price',
            'display_price',
            'retail_price.price',
            'retailPrice.price',
            'price',
            'default_price',
            'product_details.default_price',
        ], 0);

        $currencySymbol = (string) config('services.encore.currency_symbol', '$');
        $priceFormatted = (string) $this->first($item, [
            'display_price_formatted',
            'product_display_detail.price_formatted',
        ], $currencySymbol . number_format($price, 2));

        $description = (string) $this->first($item, [
            'display_product_description',
            'description',
            'product_details.description',
            'short_description',
        ], '');

        $legacyImages = collect([
            $this->first($item, ['display_product_image', 'display_image', 'catalog_image']),
            $this->first($item, ['mockup_img', 'product_details.mockup_img']),
            $this->first($item, ['mockup_img_1', 'product_details.mockup_img_1']),
            $this->first($item, ['mockup_img_2', 'product_details.mockup_img_2']),
            $this->first($item, ['mockup_img_3', 'product_details.mockup_img_3']),
            $this->first($item, ['mockup_img_4', 'product_details.mockup_img_4']),
            $this->first($item, ['image', 'image_url', 'product_image']),
        ])->filter(fn ($path) => filled($path))->values();

        foreach (['display_product_images', 'images', 'product_images'] as $path) {
            $value = data_get($item, $path);
            if (!is_array($value)) {
                continue;
            }

            foreach ($value as $image) {
                if (is_string($image)) {
                    $legacyImages->push($image);
                } elseif (is_array($image)) {
                    $legacyImages->push($this->first($image, ['url', 'path', 'image', 'image_url']));
                }
            }
        }

        $legacyImages = $legacyImages->filter(fn ($path) => filled($path))->unique()->values();

        $customImageSlots = [
            $this->first($item, ['display_main_image', 'product_display_detail.product_main_image']),
            $this->first($item, ['display_sub_image_1', 'product_display_detail.product_sub_image_1']),
            $this->first($item, ['display_sub_image_2', 'product_display_detail.product_sub_image_2']),
            $this->first($item, ['display_sub_image_3', 'product_display_detail.product_sub_image_3']),
        ];

        $gallerySlots = [];
        $slotCount = max(4, $legacyImages->count());
        for ($index = 0; $index < $slotCount; $index++) {
            $chosen = filled($customImageSlots[$index] ?? null)
                ? $customImageSlots[$index]
                : $legacyImages->get($index);

            if (filled($chosen)) {
                $gallerySlots[] = $chosen;
            }
        }

        $images = collect($gallerySlots)
            ->filter(fn ($path) => filled($path))
            ->unique()
            ->map(fn ($path) => $this->api->asset($path))
            ->values();

        if ($images->isEmpty()) {
            $images->push(asset('images/product-placeholder.svg'));
        }

        return [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'price_formatted' => $priceFormatted,
            'currency_symbol' => $currencySymbol,
            'images' => $images->all(),
            'has_custom_display' => (bool) $this->first($item, [
                'has_custom_display',
                'product_display_detail.has_custom_display',
            ], false),
            'raw' => $item,
        ];
    }

    public function normalizeCartItem($item): array
    {
        $item = $this->asArray($item);
        $product = $this->normalizeProduct($item);
        $qty = max(1, (int) $this->first($item, ['cart_qty', 'quantity', 'qty'], 1));

        $product['cart_id'] = (int) $this->first($item, ['cart_id', 'cart.id'], 0);
        $product['quantity'] = $qty;
        $product['stock_qty'] = max(0, (int) $this->first($item, ['stock_qty', 'selected_stock.stock_qty'], 0));
        $product['size_id'] = $this->nullableInt($this->first($item, ['size_id', 'selected_size.id', 'size.id']));
        $product['size_name'] = $this->first($item, ['size_name', 'selected_size.size_name', 'size.size_name'], '—');
        $product['color_id'] = $this->nullableInt($this->first($item, ['color_id', 'selected_color.id', 'color.id']));
        $product['color_hex'] = $this->normalizeHex($this->first($item, ['color_hex', 'selected_color.hex', 'color.hex']));
        $product['color_name'] = $this->first($item, ['color_name', 'selected_color.pantone_code', 'selected_color.color_name']);
        $product['line_total'] = round($product['price'] * $qty, 2);

        return $product;
    }

    protected function matchesFallbackFilters($item, array $filters): bool
    {
        $item = $this->asArray($item);

        $selectedGender = $filters['selectedGender'] ?? null;
        if ($selectedGender && $selectedGender !== 'All') {
            $gender = (string) $this->first($item, ['product_details.gender', 'productDetails.gender', 'gender'], '');
            if ($gender !== '' && !in_array($gender, [$selectedGender, 'Uni'], true)) {
                return false;
            }
        }

        $selectedStyle = $filters['selectedStyle'] ?? null;
        if ($selectedStyle && !in_array((string) $selectedStyle, ['0', 'All'], true)) {
            $styleIds = $this->relatedIds($item, [
                'product_details.product_categories',
                'productDetails.productCategories',
            ], ['product_category_id', 'categories.id', 'category.id', 'id']);

            if ($styleIds && !in_array((int) $selectedStyle, $styleIds, true)) {
                return false;
            }
        }

        return true;
    }

    protected function hasCustomDisplayFields(array $item): bool
    {
        foreach ([
            'display_product_name', 'display_product_price', 'display_price_formatted',
            'display_main_image', 'display_sub_image_1', 'display_sub_image_2',
            'display_sub_image_3', 'product_display_detail',
        ] as $key) {
            $value = data_get($item, $key);
            if ($value !== null && $value !== '' && $value !== []) {
                return true;
            }
        }

        return false;
    }

    protected function mergeCustomDisplayFields(array $detail, array $catalogue): array
    {
        foreach ([
            'display_product_name', 'display_product_price', 'display_price_formatted',
            'display_main_image', 'display_sub_image_1', 'display_sub_image_2',
            'display_sub_image_3', 'has_custom_display', 'product_display_detail',
        ] as $key) {
            $value = data_get($catalogue, $key);
            if ($value !== null && $value !== '' && $value !== []) {
                $detail[$key] = $value;
            }
        }

        return $detail;
    }

    protected function relatedIds(array $item, array $relationPaths, array $idPaths): array
    {
        $ids = collect();

        foreach ($relationPaths as $relationPath) {
            $relations = data_get($item, $relationPath, []);
            if (!is_array($relations)) {
                continue;
            }
            if (!array_is_list($relations)) {
                $relations = [$relations];
            }

            foreach ($relations as $relation) {
                if (!is_array($relation)) {
                    continue;
                }
                foreach ($idPaths as $idPath) {
                    $value = data_get($relation, $idPath);
                    if ($value !== null && $value !== '') {
                        $ids->push((int) $value);
                    }
                }
            }
        }

        return $ids->filter(fn ($id) => $id > 0)->unique()->values()->all();
    }

    protected function normalizeHex($hex): ?string
    {
        if (!$hex) {
            return null;
        }
        $hex = trim((string) $hex);
        return str_starts_with($hex, '#') ? $hex : '#' . $hex;
    }

    protected function asArray($value): array
    {
        if (is_array($value)) {
            return $value;
        }
        return (array) json_decode(json_encode($value), true);
    }

    protected function first(array $data, array $paths, $default = null)
    {
        foreach ($paths as $path) {
            $value = data_get($data, $path);
            if ($value !== null && $value !== '') {
                return $value;
            }
        }
        return $default;
    }

    protected function nullableInt($value): ?int
    {
        return ($value === null || $value === '') ? null : (int) $value;
    }
}
