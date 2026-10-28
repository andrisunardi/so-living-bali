<?php

arch('no debugging leftovers')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'vardump', 'die'])
    ->not->toBeUsed();

arch('enums are backed enums')
    ->expect('App\Enums')
    ->toBeEnums();

arch('models extend eloquent')
    ->expect('App\Models')
    ->toExtend('Illuminate\Database\Eloquent\Model');

arch('services are suffixed with Service')
    ->expect('App\Services')
    ->toHaveSuffix('Service');

arch('controllers are suffixed with Controller')
    ->expect('App\Http\Controllers')
    ->toHaveSuffix('Controller');

arch('strict types and app baseline')
    ->expect('App')
    ->not->toUse(['die', 'exit']);
