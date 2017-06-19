<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class ReservesController extends Controller
{
    public function index(){
        return view('app.reserves.index');
    }
}
