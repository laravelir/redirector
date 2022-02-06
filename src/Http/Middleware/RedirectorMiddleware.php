<?php

namespace Laravelir\Redirect\Http\Middleware;

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
        $response = $next($request);

        if ($this->redirectorService->shouldRedirect($request)) {};

    }
}
