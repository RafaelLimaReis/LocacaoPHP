<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use PresentableTrait, SoftDeletes;

    protected $presenter = UserPresenter::class;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

   protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'name', 'email' , 'username', 'phone', 'password', 'type'
    ];

    public function area(){
      return $this->hasMany(Area::class,'id_responsible','id');
    }

}
