<?php

namespace Laravelir\Redirector\Facades;

use Illuminate\Support\Facades\Facade;

class RedirectorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redirector'; // TODO: Change the accessor name
    }
}
