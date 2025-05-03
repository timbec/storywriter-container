<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*',    // ✅ exclude all API routes like /api/stories
        'api/stories', // ✅ exclude specific API route
        'api/stories/',   // 👈 with trailing slash
    ];
}
