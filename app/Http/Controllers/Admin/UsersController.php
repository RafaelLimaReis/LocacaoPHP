<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }


    public function create(){
        return view('admin.register.users.index');
    }

    public function store(UserRequest $request){
        $return = $this->userService->create($request);
        flash('Usuario cadastrado com sucesso.')->success()->important();
        return back();
    }
}
