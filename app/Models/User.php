<?php

namespace App\Models;

use App\Models\LogsUser;
use App\Presenters\UserPresenter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use PresentableTrait, SoftDeletes;

    protected $presenter = UserPresenter::class;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'name', 'email' , 'username', 'phone', 'password', 'type'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            LogsUser::create([
              'id_user' => Auth::id(),
              'id_affected_user' => $user->id,
              'description_info' => $user->name . '/' . $user->name . '/' . $user->email . '/' . $user->username . '/' . $user->phone,
              'action' => 'CREATE'
            ]);
        });
    }

    public function responsibleArea()
    {
        return $this->hasMany(Area::class, 'id_responsible', 'id');
    }

    public function reserveArea()
    {
        return $this->belongsToMany(Area::class, 'reserves', 'id_user', 'id_area')
                    ->withPivot('date', 'hour_start', 'hour_end');
    }

    public function user()
    {
        return $this->hasOne(LogsUser::class, 'id_user', 'id');
    }

    public function affected()
    {
        return $this->hasOne(LogsUser::class, 'id_affected_user', 'id');
    }
}
