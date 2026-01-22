<?php

return [
    // SLACK
    'slack' => [
        'sms' => env('SLACK_SMS'),
        'mail' => env('SLACK_MAIL'),
        'channel' => env('SLACK_CHANNEL'),
    ],

    // GHL
    'ghl' => [
        'url' => env('GHL_URL'),
        'client_id' => env('GHL_CLIENT_ID'),
        'client_secret' => env('GHL_CLIENT_SECRET'),
        'grant_type' => env('GHL_GRANT_TYPE'),
        'redirect_uri' => env('GHL_REDIRECT_URI'),
        'user_type' => env('GHL_USER_TYPE'),
    ],

    'color' => '',
];
