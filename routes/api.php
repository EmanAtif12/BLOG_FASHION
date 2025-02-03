<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostControllerApi;

// Example route for authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('post1', [PostControllerApi::class, 'index']);

// Posts resource routes
Route::resource('posts', PostControllerApi::class);

// Search route
