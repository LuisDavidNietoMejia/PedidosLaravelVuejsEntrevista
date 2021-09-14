<?php

use Illuminate\Http\Request;


Route::get('/register', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
})->name('login');

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::post('/auth/register/user', 'UserController@store')->name('auth.register.user');


// Route to handle page reload in Vue except for api routes
Route::get('/{any?}', function (){
    return redirect()->route('login');
})->where('any', '^(?!api\/)[\/\w\.-]*');
