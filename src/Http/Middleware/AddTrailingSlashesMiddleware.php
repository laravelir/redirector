<?php

namespace Laravelir\Redirector\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddTrailingSlashesMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!preg_match('/.+\/$/', $request->getRequestUri())) {
            $base_url = env('APP_URL');
            return Redirect::to($base_url . $request->getRequestUri() . '/');
        }
        return $next($request);
    }
}
