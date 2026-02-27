<?php

return [

    'url' => 'routes',

    'middlewares' => [],

    'debug_only' => true,

    'hide_methods' => [
        'HEAD',
    ],

    'hide_matching' => [
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#',
    ],

];
