<?php
Route::get('login',['as' => 'getLogin', 'uses' => 'AuthController@login']);
Route::get('logout',['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('login',['as' => 'postLogin', 'uses' => 'AuthController@postLogin']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home',['as' => 'home', 'uses' => 'HomeController@index']);

    Route::resource('User', 'UsersController', ['only' => ['create','store','index','show']]);
<<<<<<< HEAD
    Route::resource('Area', 'AreasController', ['only' => ['create','store','index','show']]);
=======
    Route::resource('Area', 'AreasController');
>>>>>>> 741c0dcf43724272020119493ffc525cf2d4c83b
});
