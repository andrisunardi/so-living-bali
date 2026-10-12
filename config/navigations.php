<?php

$id = 1;

return [
    [
        'id' => $id++,
        'name' => 'page.home',
        'route' => 'home',
    ],
    [
        'id' => $id++,
        'name' => 'page.properties',
        'route' => 'property.index',
        // 'childrens' => [
        //     [
        //         'id' => $id++,
        //         'name' => 'index.for_rent',
        //         'route' => 'property.index',
        //     ],
        //     [
        //         'id' => $id++,
        //         'name' => 'index.for_sales',
        //         'route' => 'property.properties-for-sale',
        //     ],
        // ],
    ],
    [
        'id' => $id++,
        'name' => 'page.service',
        'route' => 'service',
    ],
    [
        'id' => $id++,
        'name' => 'page.about',
        'route' => 'about',
    ],
    [
        'id' => $id++,
        'name' => 'page.guide',
        'route' => 'guide.index',
    ],
    [
        'id' => $id++,
        'name' => 'page.contact',
        'route' => 'contact',
    ],
];
