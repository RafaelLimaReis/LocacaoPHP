<?php
  Route::get('/', function () {
      return response()->json(['message' => 'Reserves API 1.0', 'status' => 'Api respondendo a solicitações']);
  });

  Route::resource('areas', 'AreaController', ['only' => ['index','show']]);
  Route::resource('users', 'UserController', ['only' => ['index','show']]);
  Route::resource('reserves', 'ReserveController', ['only' => ['index','show']]);
