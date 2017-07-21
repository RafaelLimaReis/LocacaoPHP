<?php
Route::get('login', ['as' => 'getLogin', 'uses' => 'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('filtro', ['as' => 'filtrar', 'uses' => 'ReservesController@findSchedules']);
    Route::get('findInvited', ['as' => 'findInvited', 'uses' => 'InvitedsController@findInvited']);
    Route::post('send', ['as' => 'sendInvited', 'uses' => 'InvitedsController@sendInvited']);

    Route::resource('inviteds', 'InvitedsController');
    Route::resource('reserves', 'ReservesController');
});
