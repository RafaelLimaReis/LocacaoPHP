<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AreaService;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Interfaces\AreaRepository;

class AreasController extends Controller
{
    private $areaService;
    private $userRepository;
    private $areaRepository;

    public function __construct(AreaService $areaService, UserRepository $userRepository, AreaRepository $areaRepository){
        $this->areaService = $areaService;
        $this->userRepository = $userRepository;
        $this->areaRepository= $areaRepository;
    }

    public function index(){
      $areas = $this->areaRepository->all();
      return view('admin.area.index', compact('areas'));
    }

    public function show($id){
        $area = $this->areaRepository->find($id);

        return view('admin.area.show',compact('area'));
    }

    public function create(){
        $responsibles = $this->userRepository->findWhere([
                              'type' => '1'
                        ])->pluck('name', 'id')->toArray();
        return view('admin.area.create', compact('responsibles'));
    }

    public function edit($id){
        $area = $this->areaRepository->find($id);

        $responsibles = $this->userRepository->findWhere([
                              'type' => '1'
                        ])->pluck('name', 'id')->toArray();

        return view('admin.area.edit', compact('area','responsibles'));
    }

    public function update(AreaRequest $request, $id){
        $this->areaService->update($request, $id);
        flash('Area atualizada com sucesso.')->success()->important();
        return back();
    }

    public function store(AreaRequest $request){
        $this->areaService->create($request);
        flash('Area cadastrada com sucesso.')->success()->important();
        return back();
    }
}
