<?php

namespace Laravelir\Redirector\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Laravelir\Redirector\Services\Redirector;

class RedirectorMiddleware
{
    private $redirectorService;

    public function __construct(Redirector $redirector)
    {
        $this->redirectorService = $redirector;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!config('redirector.disable')) return $next($request);

        $response = $next($request);

        // dd($this->redirectorService->all());
        if (!$this->redirectorService->shouldRedirect($request)) {
            return $response;
        };

        return $this->redirectorService->redirect($request);

    }
}
