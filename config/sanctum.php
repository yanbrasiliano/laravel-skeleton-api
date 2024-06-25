<?php

use Laravel\Sanctum\Sanctum;

return [

  'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
    '%s%s',
    'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
    Sanctum::currentApplicationUrlWithPort()
  ))),

  'guard' => ['api'],

  'expiration' => 30,

  'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

  'middleware' => [
    'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class
  ],

];
