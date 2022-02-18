<?php

namespace Laravelir\Redirector\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static bool shouldRedirect(Request $request)
 * @method static mixed redirect(Request $request)
 * @method static array all()
 * @method static object find(string $source_url)
 * @method static object|bool store(string $source_url, string $destination_url, string $response_code = '301')
 * @see \Laravelir\Redirector\Services\Redirector
 * @see \Laravelir\Redirector\Repository\RepositoryContract
 */

class RedirectorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'redirector';
    }
}
