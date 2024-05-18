<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        'admin' => \App\Http\Middleware\Admin::class,
        // Global middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            'admin' => \App\Http\Middleware\Admin::class,
            // Web middleware group
        ],
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $MiddlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'admin' => \App\Http\Middleware\Admin::class,
        // Other route middleware
    ];
}
