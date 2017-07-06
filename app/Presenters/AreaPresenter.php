<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use App\Presenters\Traits\PresentDate;

class AreaPresenter extends Presenter
{
    use PresentDate;

    public function responsible(){
      return !is_null($this->entity->id_responsible) ? $this->entity->responsible->name : null;
    }
}
