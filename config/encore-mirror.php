<?php

return [
    /* Source storefront used to build the Laravel visual copy. */
    'origin' => env('ENCORE_MIRROR_ORIGIN', 'https://encorelacrosse.com'),

    /* HTML/page request timeout. */
    'timeout' => (int) env('ENCORE_MIRROR_TIMEOUT', 30),

    /* CSS and JavaScript downloads may need longer than page requests. */
    'asset_timeout' => (int) env('ENCORE_MIRROR_ASSET_TIMEOUT', 120),

    /* Maximum number of sitemap pages checked by encore:mirror-sync. */
    'max_pages' => (int) env('ENCORE_MIRROR_MAX_PAGES', 5000),

    /*
    | Keep SSL verification enabled in production. On a local WAMP install that
    | has no CA bundle configured you may temporarily set this to false in .env.
    */
    'verify_ssl' => filter_var(
        env('ENCORE_MIRROR_VERIFY_SSL', true),
        FILTER_VALIDATE_BOOLEAN,
        FILTER_NULL_ON_FAILURE
    ) ?? true,
];
