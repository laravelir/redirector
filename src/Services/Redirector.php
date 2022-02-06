<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Redirector
{
    private $router;

    public function __construct(Route $router)
    {
        $this->route = $router;
    }

    public function shouldRedirect(Request $request)
    {
        # code...
    }

    public function redirect($route, $new_route)
    {
        # code...
    }

    public function responseCode()
    {
        $code = config('redirector.default_response_code');
        $valid = [300, 301, 302, 303, 304, 307, 308];
        if (!in_array($code, $valid)) {
            $code = 301;
        }
        return $code;
    }

    public function useType()
    {
        return config('redirector.use_type') ?? 'config';
    }
}
