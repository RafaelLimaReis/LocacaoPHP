<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\InvitedRepository;
use App\Models\Invited;
use App\Validators\InvitedValidator;

/**
 * Class InvitedRepositoryEloquent
 * @package namespace App\Repositories;
 */
class InvitedRepositoryEloquent extends BaseRepository implements InvitedRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Invited::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
