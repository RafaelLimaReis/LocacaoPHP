<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AreaService;
use App\Repositories\Interfaces\userRepository;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;

class AreasController extends Controller
{
    private $areaService;
    private $userRepository;

    public function __construct(AreaService $areaService, userRepository $userRepository){
        $this->areaService = $areaService;
        $this->userRepository = $userRepository;
    }

    public function index(){
      $areas = $this->areaRepository->all();
      return view('admin.area.index', compact('areas'));
    }

    public function create(){
        $responsibles = $this->userRepository->findWhere([
                              'type' => '1'
                        ])->pluck('name', 'id')->toArray();
        return view('admin.area.create', compact('responsibles'));
    }

    public function store(AreaRequest $request){
        $this->areaService->create($request);
        flash('Area cadastrada com sucesso.')->success()->important();
        return back();
    }
}
