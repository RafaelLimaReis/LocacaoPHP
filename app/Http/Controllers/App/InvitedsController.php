<?php

namespace App\Http\Controllers\App;

use Flash;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\InvitedService;
use App\Http\Requests\loginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\InvitedRepository;

class InvitedsController extends Controller
{
    private $invitedService;
    private $invitedRepository;

    public function __construct(InvitedRepository $invitedRepository, InvitedService $invitedService)
    {
        $this->invitedService = $invitedService;
        $this->invitedRepository = $invitedRepository;
    }

    public function store(Request $request)
    {
        $this->invitedService->create($request);
        return back();
    }

    public function sendInvited(Request $request)
    {
        $this->invitedService->sendInvited($request);
        flash('Convidado adicionado com sucesso')->important();
        return back();
    }

    public function findInvited(Request $request)
    {
        return $this->invitedService->findInvited($request);
    }
}
