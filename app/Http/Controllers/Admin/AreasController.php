<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AreaService;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;

class AreasController extends Controller
{
    private $areaService;

    public function __construct(AreaService $areaService){
        $this->areaService = $areaService;
    }


    public function create(){
        return view('admin.register.area.index');
    }

    public function store(AreaRequest $request){
        $this->areaService->create($request);
        flash('Area cadastrada com sucesso.')->success()->important();
        return back();
    }
}
