<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Source storefront
    |--------------------------------------------------------------------------
    |
    | The Laravel project mirrors this storefront. Keeping the public Shopify
    | CDN references means the same theme CSS, JavaScript, fonts, images and
    | video animations are used instead of maintaining a second asset bundle.
    |
    */
    'origin' => env('ENCORE_MIRROR_ORIGIN', 'https://encorelacrosse.com'),

    /* Maximum upstream request time in seconds. */
    'timeout' => (int) env('ENCORE_MIRROR_TIMEOUT', 30),

    /*
    | SSL verification should stay enabled in production. If a local WAMP PHP
    | installation has no CA bundle configured, set ENCORE_MIRROR_VERIFY_SSL=false
    | in the local .env file rather than changing application code.
    */
    'verify_ssl' => filter_var(
        env('ENCORE_MIRROR_VERIFY_SSL', true),
        FILTER_VALIDATE_BOOLEAN,
        FILTER_NULL_ON_FAILURE
    ) ?? true,
];
