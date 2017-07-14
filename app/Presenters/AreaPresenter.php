<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use App\Presenters\Traits\PresentDate;

class AreaPresenter extends Presenter
{
    use PresentDate;

    public function responsible()
    {
        return !is_null($this->entity->id_responsible) ? $this->entity->responsibleUser->name : null;
    }

    public function reserve()
    {
        $date = explode('-', $this->entity->pivot->date);
        $date = $date[2].'/'.$date[1].'/'.$date[0];
        return $date;
    }
}
