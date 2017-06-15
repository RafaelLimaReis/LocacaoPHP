<?php
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@postLogin');
Route::post('login', 'AuthController@logout');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){
        return view('app.layouts.app');
    })->name('home');
});
