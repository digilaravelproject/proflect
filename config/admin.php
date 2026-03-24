<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin Credentials
    |--------------------------------------------------------------------------
    |
    | These credentials are used by the built-in admin panel. In production
    | you should consider using a proper user model or an admin guard.
    |
    */

    'email' => env('ADMIN_EMAIL', 'admin@proflect.com'),
    'password' => env('ADMIN_PASSWORD', 'Admin@123'),
];
