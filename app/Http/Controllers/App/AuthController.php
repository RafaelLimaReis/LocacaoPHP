<?php

namespace App\Http\Controllers\App;

use Flash;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(){
      return view('app.auth.login');
  }

  public function postLogin(loginRequest $req){
      $user = $req->all();
      if(Auth::attempt(['username' => $user['user'], 'password' => $user['pass']])){
          return redirect(route('app.home'));
      }else{
          flash('Usuario e/ou senha incorretos.')->error()->important();
          return back()->withInput();
      }

  }
  public function logout(){
    Auth::logout();
    return redirect(route('app.home'));
  }
}
