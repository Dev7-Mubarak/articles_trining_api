<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*')) {
                $status = 500;
                $message = $e->getMessage();
                $errors = null;

                if ($e instanceof AuthenticationException) {
                    $status = 401;
                    $message = 'Unauthenticated';
                } elseif ($e instanceof ValidationException) {
                    $status = 422;
                    $message = 'Validation Error';
                    $errors = $e->errors();
                } elseif ($e instanceof NotFoundHttpException) {
                    $status = 404;
                    $message = 'Resource not found';
                } elseif (method_exists($e, 'getStatusCode')) {
                    $status = $e->getStatusCode();
                }

                if ($status === 500 && !config('app.debug')) {
                    $message = 'Server Error';
                }

                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'data'    => null,
                    'errors'  => $errors,
                ], $status);
            }
        });
    })->create();
