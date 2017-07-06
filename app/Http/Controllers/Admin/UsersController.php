<?php

namespace App\Http\Controllers\Admin;

use Flash;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepository;

class UsersController extends Controller
{
    private $userService;
    private $userRepository;

    public function __construct(UserService $userService, UserRepository $userRepository){
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function index(){
      $users = $this->userRepository->all();
      return view('admin.users.index',compact('users'));
    }

    public function create(){
      return view('admin.users.create');
    }

    public function store(UserRequest $request){
        $return = $this->userService->create($request);
        flash('Usuario cadastrado com sucesso.')->success()->important();
        return back();
    }
}
