<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect('/api/v1');
});

Route::prefix('v1')->group(function () {
  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
  });

  Route::get('/', function () {
    return response()->json([
      'message' => 'API Online, Welcome to the API Laravel 11 Skeleton',
    ]);
  });
});
