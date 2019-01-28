<?php

Route::post('login', 'APILoginController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'APILoginController@logout');
    Route::post('refresh', 'APILoginController@refresh');
    Route::post('me', 'APILoginController@me');
});
