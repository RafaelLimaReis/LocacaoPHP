<?php
namespace App\Http\Controllers\App;

use Flash;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AreaRepository;
use App\Http\Controllers\Controller;

class ReservesController extends Controller
{

    private $areaRepository;

    public function __construct(AreaRepository $areaRepository){
        $this->areaRepository = $areaRepository;
    }

    public function index(){
        return view('app.reserves.index');
    }

    public function create(){
        $areas = $this->areaRepository->all()->pluck('name','id')->toArray();
        return view('app.reserves.create', compact('areas'));
    }
}
