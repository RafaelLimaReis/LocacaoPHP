<?php

namespace App\Models;

use App\Presenters\AreaPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Traits\TransformableTrait;

class Area extends Model
{
    use PresentableTrait , SoftDeletes;

    protected $presenter = AreaPresenter::class;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name','description','number','id_responsible'];

    const SCHEDULES = [
       ['hour' => '07:00:00', 'color' => 'black'],
       ['hour' => '07:30:00', 'color' => 'black'],
       ['hour' => '08:00:00', 'color' => 'black'],
       ['hour' => '08:30:00', 'color' => 'black'],
       ['hour' => '09:00:00', 'color' => 'black'],
       ['hour' => '09:30:00', 'color' => 'black'],
       ['hour' => '10:00:00', 'color' => 'black'],
       ['hour' => '10:30:00', 'color' => 'black'],
       ['hour' => '11:00:00', 'color' => 'black'],
       ['hour' => '11:30:00', 'color' => 'black'],
       ['hour' => '12:00:00', 'color' => 'black'],
       ['hour' => '12:30:00', 'color' => 'black'],
       ['hour' => '13:00:00', 'color' => 'black'],
       ['hour' => '13:30:00', 'color' => 'black'],
       ['hour' => '14:00:00', 'color' => 'black'],
       ['hour' => '14:30:00', 'color' => 'black'],
        ];

    public function responsibleUser()
    {
        return $this->belongsTo(User::class, 'id_responsible', 'id');
    }

    public function reserveUser()
    {
        return $this->belongsToMany(User::class, 'reserves', 'id_area', 'id_user');
    }
}
