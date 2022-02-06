<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Support\Facades\Route;

class Redirector
{
    private $router;

    public function __construct(Route $router)
    {
        $this->route = $router;
    }

    public function checkExistUrl($route)
    {
        # code...
    }

}
