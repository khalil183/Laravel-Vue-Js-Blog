<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('category','Admin\CategoryController');
Route::apiResource('blog','Admin\PostController');

// Frontend
Route::apiResource('user/post','Frontend\HomeController');

