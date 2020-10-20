<?php

namespace Readandrate\ModelSettingsField\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Readandrate\ModelSettingsField\ModelSettingsField;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next): Response
    {
        return app(ModelSettingsField::class)->authorize($request)
            ? $next($request)
            : abort(403);
    }
}
