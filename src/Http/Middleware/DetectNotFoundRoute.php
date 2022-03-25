<?php

namespace Laravelir\Redirector\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DetectNotFoundRoute
{
    public function handle(Request $request, Closure $next)
    {

        $routeCollection = collect(Route::getRoutes());
        $existingRoutes = $routeCollection->map(function ($item) {
            return [$item->uri][0];
        })->toArray();

        $reqUri = trim($request->getPathInfo(), '/');
        // dd($reqUri, $existingRoutes[41]);

        // dd($request->getPathInfo());
        if (in_array($reqUri, $existingRoutes) || $request->getPathInfo() == '/') {
            dd(true);
        } else {
            dd(false);
        }
        // $routeCollection->each(function ($item) use ($request) {
        //     if ($item->uri() == $request->getPathInfo()) {
        //     } else {
        //     }
        // });


        return $next($request);
    }
}
