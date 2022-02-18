<?php

use Laravelir\Redirector\Services\Redirector;


if (!function_exists('redirector')) {
    function redirector()
    {
        return app()->singleton(Redirector::class);
    }
}

if (!function_exists('validateUrl')) {

    function validateUrl(string $url)
    {
        $url = strtolower(trim($url));
        return $url;
    }
}

if (!function_exists('validStatusCode')) {
    function validStatusCode($code = null)
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
}
