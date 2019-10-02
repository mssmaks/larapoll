<?php
return [
    'middleware' => env('LARAPOLL_MIDDLEWARE', 'auth:web'),
    'pagination' => env('LARAPOLL_PAGINATION', 15),
    'prefix' => env('LARAPOLL_PREFIX', 'admin_polls'),
    'user_model' => App\Models\Auth\User::class,
];
