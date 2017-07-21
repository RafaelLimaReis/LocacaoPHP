<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Services\InvitedService;
use App\Http\Controllers\Controller;

class InvitedsController extends Controller
{
    private $invitedService;

    public function __construct(InvitedService $invitedService)
    {
        $this->invitedService = $invitedService;
    }

    public function index($id)
    {
        $inviteds = $this->invitedService->findInviteds($id);
        return view('admin.users.inviteds_show', compact('inviteds'));
    }
}
