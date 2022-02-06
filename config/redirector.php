<?php

// config file for laravelir/redirector


return [
    'redirector' => Laravelir\Redirector\Services\Redirector::class,

    /**
     * config: read redirects from config file redirects key
     * database: read redirects from database (if you add redirects section in admin panel)
     */
    'use_type' => 'config',

    'default_response_code' => 301,

    'redirects' => [
        [
            'old_url' => '',
            'new_url' => '',
        ],
    ],
];
