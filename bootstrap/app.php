<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\owner;
use App\Http\Middleware\storemanager;
use App\Http\Middleware\warehousemanager;
use App\Http\Middleware\driver;
use App\Http\Middleware\customer;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'owner'=>owner::class,
            'storemanager'=>storemanager::class,
            'warehousemanager'=>warehousemanager::class,
            'driver'=>driver::class,
            'customer'=>customer::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
