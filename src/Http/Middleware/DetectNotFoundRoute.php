<?php

namespace Laravelir\Redirector\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravelir\Redirector\Services\Redirector;

class DetectNotFoundRoute
{

    private $redirectorService;

    public function __construct(Redirector $redirector)
    {
        $this->redirectorService = $redirector;
    }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // dd($_SERVER);
        $routeCollection = collect(Route::getRoutes());
        $existingRoutes = $routeCollection->map(function ($item) {
            return [$item->uri][0];
        })->toArray();


        $reqUri = trim($request->getPathInfo(), '/');

        if (in_array($reqUri, $existingRoutes) || $request->getPathInfo() == '/') {
            return $response;
        } else {

            if ($this->shouldRedirect($request)) {
                return $this->redirectorService->redirect($request);
            }

            return $response;
        }

    [
        'https://rasadm.com/آموزش-سئو/‏' => ''
    ]
        return $response;
    }

    private function shouldRedirect($request)
    {

        $disabled = config('redirector.disabled') ?? 'no';
        if ($disabled == 'yes') {
            return false;
        }

        if (!$this->redirectorService->shouldRedirect($request)) {
            return false;
        }
        return true;
    }
}
