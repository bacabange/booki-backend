<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |
     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Content-Type', 'Accept', 'x-xsrf-token', ' x-csrf-token', 'Authorization'],
    'allowedMethods' => ['GET', 'POST', 'PUT',  'DELETE', 'PATCH'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],
];

