<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravelir\Redirector\Models\Redirector as ModelsRedirector;

class Redirector
{
    private $model;

    public function __construct(ModelsRedirector $redirector)
    {
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
        return redirect($redirect->destination_url, $redirect->response_code);
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

    public function findRedirect($url)
    {
        return $this->model->where('source_url', $url)->first();
    }

    public function store($source_url, $destination_url, $response_code = 301, $type = null)
    {
        if ($this->model->where('source_url', $source_url)->first()) {
            return false;
        }
        return $this->model->create(['source_url' => $source_url, 'destination_url' => $destination_url, 'response_code' => $response_code]);
    }
}
