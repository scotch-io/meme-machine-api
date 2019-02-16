<?php

Route::prefix('{user}')->group(function () {

    Route::post('login', 'APIAuthController@login');
    Route::post('register', 'APIAuthController@register');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', 'APIAuthController@logout');
        Route::post('refresh', 'APIAuthController@refresh');
        Route::post('me', 'APIAuthController@me');
    });

    Route::get('gifs/{id}', 'SingleGifController');
    Route::get('gifs/trending', 'TrendingGifController');
    Route::get('gifs/random', 'RandomGifController');
    Route::get('gifs/search/{query}', 'SearchGifController');
    Route::apiResource('memes', 'MemeController');

});
