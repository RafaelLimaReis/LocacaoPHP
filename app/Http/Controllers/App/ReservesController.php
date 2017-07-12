<?php
namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Services\ReserveService;
use App\Repositories\Interfaces\AreaRepository;
use App\Http\Controllers\Controller;

class ReservesController extends Controller
{
    private $reserveService;
    private $areaRepository;

    public function __construct(ReserveService $reserveService, AreaRepository $areaRepository){
        $this->reserveService = $reserveService;
        $this->areaRepository = $areaRepository;
    }

    public function index(){
        $areas = $this->areaRepository->all()->pluck('name','id')->toArray();
        return view('app.reserves.index', compact('areas'));

    }

    public function store(Request $request){
        $this->reserveService->create($request);
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            return $this->reserveService->findSchedules();
        }
    }
}
