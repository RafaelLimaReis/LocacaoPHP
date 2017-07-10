<?php
namespace App\Http\Controllers\App;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Services\ReserveService;
use App\Http\Controllers\Controller;

class ReservesController extends Controller
{
    private $reserveService;

    public function __construct(ReserveService $reserveService){
        $this->reserveService = $reserveService;
    }

    public function index(){
        return view('app.reserves.index');
    }

    public function store(Request $request){
        $inputs = $request->except('_token');
        $this->reserveService->create($inputs);
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            return Schedule::HOURS;
        }
    }
}
