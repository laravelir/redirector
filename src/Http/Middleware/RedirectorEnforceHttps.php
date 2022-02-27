<?php

namespace Laravelir\Redirector\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Schema;

class RedirectorEnforceHttps
{
    public function handle(Request $request, Closure $next)
    {
        if (env('REDIRECTOR_ENFORCE_HTTPS') || config('redirector.enforce_https')) {
            if (!$request->isSecure()) {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
