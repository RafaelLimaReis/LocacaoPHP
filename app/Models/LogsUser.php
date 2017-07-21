<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LogsUser extends Model implements Transformable
{
    use TransformableTrait;

    public $table = 'logsuser';

    protected $dates = ['event_fired'];

    protected $fillable = ['id_user','id_affected_user','description_info','action'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function affected()
    {
        return $this->belongsTo(User::class, 'id_affected_user', 'id');
    }
}
