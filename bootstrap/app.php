<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\UnitclerkMiddleware;
use App\Http\Middleware\UnitocMiddleware;
use App\Http\Middleware\ShopcoordclerkMiddleware;
use App\Http\Middleware\ShopcoordocMiddleware;
use App\Http\Middleware\WelfareshopclerkMiddleware;
use App\Http\Middleware\WelfareshopockMiddleware;
use App\Http\Middleware\LedgerclerkMiddleware;
use App\Http\Middleware\LedgerockMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'=> AdminMiddleware::class,
            'user'=> UserMiddleware::class,
            'unitclerk'=> UnitclerkMiddleware::class,
            'unitoc'=> UnitocMiddleware::class,
            'shopcoordclerk'=> ShopcoordclerkMiddleware::class,
            'shopcoordoc'=> ShopcoordocMiddleware::class,
            'welfareshopclerk'=> WelfareshopclerkMiddleware::class,
            'welfareshopoc'=> WelfareshopocMiddleware::class,
            'ledgerclerk'=> LedgerclerkMiddleware::class,
            'ledgeroc'=> LedgerocMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => $e->getMessage(),
                ], 401);
            }
        });
    })->create();
