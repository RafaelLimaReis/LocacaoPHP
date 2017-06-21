<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Http\Controllers\Controller;

class AreasController extends Controller
{
    public function create(){
        return view('admin.register.area.index');
    }
}
