<?php

Route::post('login', 'APIAuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'APIAuthController@logout');
    Route::post('refresh', 'APIAuthController@refresh');
    Route::post('me', 'APIAuthController@me');
});

Route::get('gifs/random', 'RandomGifController');
Route::apiResource('memes', 'MemeController');
