<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepository;

class UserService {

    private $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function create($request){
        $user = $request->all();

        $user['created_at'] = $user['updated_at'] = Carbon::now();
        $user['password'] = Hash::make($user['password']);

       // $this->userRepository->create($user);
        return $user;
    }
}