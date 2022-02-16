<?php

// config file for laravelir/redirector


return [
    'redirector' => Laravelir\Redirector\Services\Redirector::class,

    // valid codes: 300, 301, 302, 303, 304, 307, 308
    'default_response_code' => 301,
];
