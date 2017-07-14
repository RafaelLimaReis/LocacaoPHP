<?php
namespace App\Http\Controllers\App;

use Flash;
use Illuminate\Http\Request;
use App\Services\ReserveService;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\AreaRepository;

class ReservesController extends Controller
{

    private $areaRepository;
    private $reserveService;
    private $userRepository;

    public function __construct(AreaRepository $areaRepository, ReserveService $reserveService, UserRepository $userRepository)
    {
        $this->areaRepository = $areaRepository;
        $this->userRepository = $userRepository;
        $this->reserveService = $reserveService;
    }

    public function index()
    {
        $user = $this->userRepository->find(Auth::id());
        $reserves = $user->reserveArea;
        return view('app.reserves.index', compact('reserves'));
    }

    public function create()
    {
        $areas = $this->areaRepository->all()->pluck('name', 'id')->toArray();
        return view('app.reserves.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $this->reserveService->create($request);
        flash('Reserva realizada com sucesso.')->success()->important();
        return back();
    }

    public function findSchedules(Request $request)
    {
        $schedules = $this->reserveService->findSchedule($request);
        return $schedules;
    }
}
