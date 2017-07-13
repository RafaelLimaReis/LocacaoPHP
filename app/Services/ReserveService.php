<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\ReserveRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;

class ReserveService {

    private $reserveRepository;
    private $userRepository;


    public function __construct(UserRepository $userRepository, ReserveRepository $reserveRepository){
        $this->reserveRepository = $reserveRepository;
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

    public function findSchedules(Request $request){
        $schedules = Reserve::Schedules;
        $max = sizeof($schedules);
        $reserves = $this->reserveRepository->all();
        $reserve = $request->except('_token');
        for($i=0; $i < $reserves->count(); $i++){
            $date = explode('-',$reserves[$i]->date_reserve);
            $date = $date[2].'/'.$date[1].'/'.$date[0];
            if($reserve['id_area'] == $reserves[$i]->id_area){
                if($date == $reserve['date_reserve']){
                    for($k=1; $k <= $max; $k++){
                        if((($schedules[$k] == $reserves[$i]->id_inicio)||($schedules[$k] == $reserves[$i]->id_fim))||(($schedules[$k] > $reserves[$i]->id_inicio) && ($schedules[$k] < $reserves[$i]->id_fim))){
                            unset($schedules[$k]);
                        };
                    };
                };
            };
        };
        //$schedules = array_values($schedules);
        return $schedules;
    }
}