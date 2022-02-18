<?php

// config file for laravelir/redirector


return [
    /**
     * available repositories:
     * mysql - mongodb - redis - xml
     */
    'repository' => 'mysql',

    /**
     * disabled package functionality
     * yes - no
     */
    'disabled' => 'no',

    // valid codes: 300, 301, 302, 303, 304, 307, 308
    'default_response_code' => env('REDIRECTOR_DEFAULT_RESPONSE_CODE', 301),
];
