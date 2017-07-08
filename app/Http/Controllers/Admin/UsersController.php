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

    public function show($id){
      $user = $this->userRepository->find($id);

      return view('admin.users.show',compact('user'));
    }

    public function create(){
      return view('admin.users.create');
    }

    public function edit($id){
      $user = $this->userRepository->find($id);
      return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id){
      $this->userService->update($request, $id);
      flash('Usuario editado com sucesso.')->success()->important();
      return back();
    }

    public function store(UserRequest $request){
        $return = $this->userService->create($request);
        flash('Usuario cadastrado com sucesso.')->success()->important();
        return back();
    }

    public function destroy($id){
      $this->userRepository->delete($id);
      flash('Usuario excluido com sucesso.')->important();
      return back();
    }
}
