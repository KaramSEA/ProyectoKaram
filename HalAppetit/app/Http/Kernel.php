<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

// Middleware Global
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Foundation\Http\Middleware\TrimStrings;

// Middleware Web
use App\Http\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;

// Middleware API
use Illuminate\Routing\Middleware\ThrottleRequests;

// Middleware individuales
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

// Personalizado
use App\Http\Middleware\AdminOnly;

class Kernel extends HttpKernel
{
    /**
     * Middleware global de toda la aplicación.
     */
    protected $middleware = [
        HandleCors::class,
        TrustProxies::class,
        ValidatePostSize::class,
        PreventRequestsDuringMaintenance::class,
        ConvertEmptyStringsToNull::class,
        TrimStrings::class,
    ];

    /**
     * Middleware para grupos de rutas.
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],

        'api' => [
            ThrottleRequests::class . ':api',
            SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware individuales que puedes aplicar por nombre.
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'guest' => RedirectIfAuthenticated::class,
        'verified' => EnsureEmailIsVerified::class,

        // Middleware personalizado
        'admin.only' => AdminOnly::class,
    ];
}
