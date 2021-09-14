<?php

use Illuminate\Http\Request;


Route::group(['middleware' => 'api'], function () {
    Route::post('/login', 'Auth\LoginApiController@login')->name('login.api');
    Route::post('/logout/api', 'Auth\LoginApiController@logout')->name('logout.api');
    Route::post('/auth/register/user', 'UserController@store')->name('auth.register.user.api');
});
