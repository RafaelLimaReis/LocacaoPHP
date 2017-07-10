<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\ReserveRepository;
use App\Models\Reserve;
use App\Validators\ReserveValidator;

/**
 * Class ReserveRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ReserveRepositoryEloquent extends BaseRepository implements ReserveRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Reserve::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
