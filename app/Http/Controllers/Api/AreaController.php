<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AreaRepository;

class AreaController extends Controller
{
    private $areaRepository;

    public function __construct(AreaRepository $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    public function index()
    {
        $areas = $this->areaRepository->all();
        return response()->json($areas->toArray());
    }

    public function show($id)
    {
        $area = $this->areaRepository->find($id);
        return response()->json($area->toArray());
    }
}
