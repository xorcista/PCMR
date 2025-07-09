<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    

    protected $routeMiddleware = [
        
        // Aquí registras tu middleware personalizado
        'rol' => \App\Http\Middleware\RolMiddleware::class,
    ];
}
