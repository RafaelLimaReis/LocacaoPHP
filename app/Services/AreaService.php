<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\AreaRepository;

class AreaService {

    private $areaRepository;

    public function __construct(AreaRepository $areaRepository){
        $this->areaRepository = $areaRepository;
    }

    public function create($request){
        $area = $request->all();
        $area['created_at'] = $area['updated_at'] = Carbon::now();

        $this->areaRepository->create($area);
        return $area;
    }
}