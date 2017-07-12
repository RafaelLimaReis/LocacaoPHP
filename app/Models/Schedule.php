<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Schedule extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function schedulesArea(){
        return $this->belongsToMany(Area::class,'reserve','id','id_area');
    }

}
