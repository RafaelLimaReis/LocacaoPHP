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

    public function responsible(){
      return $this->belongsTo(User::class,'id_responsible','id');
    }

}
