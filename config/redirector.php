<?php

// config file for laravelir/redirector


return [
    'redirector' => Laravelir\Redirector\Services\Redirector::class,

    'default_response_code' => 301,

    /**
     * config: read redirects from config file redirects key
     * database: read redirects from database (if you add redirects section in admin panel)
     */
    'use_type' => 'config',

    'redirects' => [
        [
            'old_url' => '',
            'new_url' => '',
        ],
    ],
];
