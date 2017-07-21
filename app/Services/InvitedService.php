<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Interfaces\InvitedRepository;

class InvitedService
{

    private $invitedRepository;

    public function __construct(InvitedRepository $invitedRepository)
    {
        $this->invitedRepository = $invitedRepository;
    }

    public function create($request)
    {
        $inputs = $request->except('_token');
        //dd($inputs);
        $inputs['created_at'] = $inputs['updated_at'] = Carbon::now();

        $this->invitedRepository->create($inputs);
    }

    public function findInvited($request)
    {
        $query = '%'. $request->input('query') . '%';
        $inviteds = $this->invitedRepository->findWhere([
            ['name','LIKE',$query]
        ]);
        return $inviteds;
    }

    public function sendInvited($request)
    {
        $inputs = $request->all();
        $inviteds = explode(',', $inputs['id_invited']);
        $inputs['created_at'] = $inputs['updated_at'] = Carbon::now();
        for ($i=0; $i < sizeof($inviteds); $i++) {
            $inputs['id_invited'] = $inviteds[$i];
            DB::table('inviteds_has_reserve')->insert(['id_invited' => $inputs['id_invited'], 'id_reserve' => $inputs['id_reserve'], 'created_at' => $inputs['created_at'], 'updated_at' => $inputs['updated_at']]);
        }
    }
}
