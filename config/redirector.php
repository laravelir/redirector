<?php

// config file for laravelir/redirector


return [
    'redirector' => Laravelir\Redirector\Services\Redirector::class,

    /**
     * config: read redirects from config file redirects key
     * database: read redirects from database (if you add redirects section in admin panel)
     */
    'use_type' => 'config',

    // valid codes: 300, 301, 302, 303, 304, 307, 308
    'default_response_code' => 301,

    'redirects' => [
        [
            'old_url' => '',
            'new_url' => '',
        ],
    ],
];
