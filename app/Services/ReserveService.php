<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\ReserveRepository;

class ReserveService {

    private $reserveRepository;

    public function __construct(ReserveRepository $reserveRepository){
        $this->reserveRepository = $reserveRepository;
    }

    public function create(){

    }

}