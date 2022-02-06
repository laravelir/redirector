<?php

namespace Laravelir\Redirector\Services;

use Illuminate\Support\Facades\Route;

class Redirector
{
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }


}
