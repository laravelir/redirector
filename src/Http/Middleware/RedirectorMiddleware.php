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
        $response = $next($request);

        if ($this->shouldRedirect($request)) {
            return $this->redirectorService->redirect($request);
        }

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
