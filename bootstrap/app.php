<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );

        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                $errors = [];

                foreach ($e->errors() as $pointer => $messages) {
                    foreach ($messages as $message) {
                        $errors[] = [
                            "status" => "422",
                            "title" => "Error de validación",
                            "detail" => $message,
                            "source" => [
                                "pointer" => "/" . str_replace('.', '/', $pointer)
                            ]
                        ];
                    }
                }

                return response()->json(["errors" => $errors], 422);
            }
        });
    })->create();
