<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\LogsUserRepository;
use App\Models\LogsUser;
use App\Validators\LogsUserValidator;

/**
 * Class LogsUserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class LogsUserRepositoryEloquent extends BaseRepository implements LogsUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LogsUser::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
