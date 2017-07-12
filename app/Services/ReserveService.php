<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\ReserveRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;

//mudar
use App\Repositories\Interfaces\ScheduleRepository;

class ReserveService {

    private $reserveRepository;
    private $userRepository;
    //mudar
    private $scheduleRepository;

    public function __construct(UserRepository $userRepository, ReserveRepository $reserveRepository, ScheduleRepository $scheduleRepository){
        $this->reserveRepository = $reserveRepository;
        $this->scheduleRepository = $scheduleRepository;
        $this->userRepository = $userRepository;
    }

    public function create($request){
        $inputs = $request->except('_token');
        $inputs['id_user'] = Auth::id();
        $inputs['date_reserve'] = Carbon::createFromFormat('d/m/Y', $request->date_reserve);
        $inputs['created_at'] = $inputs['updated_at'] = Carbon::now();
        $user = $this->userRepository->find(Auth::id());
        $user->reservesArea()->attach(Auth::id(),$inputs);
    }

    public function findSchedules(){
        return $this->scheduleRepository->all()->pluck('hour','id')->toArray();
    }
}