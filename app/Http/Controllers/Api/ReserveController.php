<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ReserveService;

class ReserveController extends Controller
{
    private $reserveService;

    public function __construct(ReserveService $reserveService)
    {
        $this->reserveService = $reserveService;
    }

    public function index()
    {
        $reserves = $this->reserveService->allReserves();
        return response()->json($reserves);
    }
}
