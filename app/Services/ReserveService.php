<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;

class ReserveService
{

    private $reserveRepository;
    private $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($request)
    {
        $inputs = $request->except('_token');
        $inputs['id_user'] = Auth::id();
        $inputs['date'] = Carbon::createFromFormat('d/m/Y', $request->date);
        $inputs['created_at'] = $inputs['updated_at'] = Carbon::now();
        $user = $this->userRepository->find(Auth::id());
        $user->reserveArea()->attach(Auth::id(), $inputs);
    }

    public function findSchedule(Request $request)
    {
        $schedules = Area::SCHEDULES;
        $reserves = DB::table('reserves')->get();
        $reserve = $request->all();
        for ($i=0; $i < sizeof($reserves); $i++) {
            $date = explode('-', $reserves[$i]->date);
            $date = $date[2].'/'.$date[1].'/'.$date[0];
            if (($reserves[$i]->id_area) == ($reserve['id_area'])) {
                if ($date == $reserve['date']) {
                    for ($k=0; $k < sizeof($schedules); $k++) {
                        if ((($schedules[$k]['hour'] == $reserves[$i]->hour_start)||($schedules[$k]['hour'] == $reserves[$i]->hour_end))||(($schedules[$k]['hour'] > $reserves[$i]->hour_start) && ($schedules[$k]['hour'] < $reserves[$i]->hour_end))) {
                            $schedules[$k]['color'] = 'red';
                        };
                    };
                };
            };
        };
        return $schedules;
    }
}
