<?php

use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\AuthClientMiddleware;
use App\Http\Middleware\AuthEmployeeMiddleware;
use App\Http\Middleware\AuthVendorMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\PreventBackHistoryMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'clear_cache' => PreventBackHistoryMiddleware::class,
            'auth_admin' => AuthAdminMiddleware::class,
            'guest' => GuestMiddleware::class,
            'auth_employee' => AuthEmployeeMiddleware::class,
            'auth_client' => AuthClientMiddleware::class,
            'auth_vendor' => AuthVendorMiddleware::class,
            // ...
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
