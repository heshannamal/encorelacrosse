<?php

$encoreApiUrl = rtrim((string) env('ENCORE_API_URL', 'https://inventory.encr.co/api'), '/');
$encoreAssetUrl = rtrim((string) env('ENCORE_ASSET_URL', 'https://encr.co'), '/');

return [

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'encore' => [
        'base_url' => $encoreApiUrl,
        'api_url' => $encoreApiUrl,
        'asset_url' => $encoreAssetUrl,
        'api_key' => env('ENCORE_API_KEY', 'inventory_products_api'),
        'api_token' => env('ENCORE_API_TOKEN'),
        'sales_channel_id' => env('ENCORE_SALES_CHANNEL_ID', 1),
        'inventory_type_id' => env('ENCORE_INVENTORY_TYPE_ID', 2),
        'currency_symbol' => env('ENCORE_CURRENCY_SYMBOL', '$'),
        'timeout' => env('ENCORE_API_TIMEOUT', 30),
        'connect_timeout' => env('ENCORE_API_CONNECT_TIMEOUT', 10),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

    'instagram' => [
        'user_id' => env('INSTAGRAM_USER_ID'),
        'access_token' => env('INSTAGRAM_ACCESS_TOKEN'),
        'username' => env('INSTAGRAM_USERNAME', 'encorelacrosse'),
        'version' => env('INSTAGRAM_API_VERSION', 'v25.0'),
        'feed_limit' => env('INSTAGRAM_FEED_LIMIT', 8),
    ],

];
