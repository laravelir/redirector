<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravelir\Redirector\Models\Redirector as ModelsRedirector;

class Redirector
{
    private $router;
    private $model;

    public function __construct(Route $router, ModelsRedirector $redirector)
    {
        $this->route = $router;
        $this->model = $redirector;
    }

    public function shouldRedirect(Request $request)
    {
        if (!$request->isMethod('get') || $request->expectsJson()) {
            return false;
        }
        $redirect = $this->findRedirect($request->path());
        if (!$redirect) {
            return false;
        }
        return true;
    }

    public function redirect(Request $request)
    {
        $redirect = $this->findRedirect($request->path());
        return redirect($redirect->new_url, $redirect->response_code);
    }

    public function responseCode($code = null)
    {
        $code = $code;
        if ($code == null) {
            $code = config('redirector.default_response_code');
        }
        $valid = [301, 302, 303, 304, 307, 308, 410, 451];
        if (!in_array($code, $valid)) {
            $code = 301;
        }
        return $code;
    }

    public function redirects()
    {
        return $this->model->latest()->get();
    }

    public function findRedirect($route)
    {
        return $this->model->where('old_url', $route)->first();
    }

    public function store($old_route, $new_route, $response_code = 301, $type = null)
    {
        if ($this->model->where('old_url', $old_route)->first()) {
            return false;
        }
        return $this->model->create(['old_url' => $old_route, 'new_url' => $new_route, 'response_code' => $response_code]);
    }
}
