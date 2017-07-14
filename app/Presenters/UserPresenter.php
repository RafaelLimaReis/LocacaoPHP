<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use App\Presenters\Traits\PresentDate;

class UserPresenter extends Presenter
{
    use PresentDate;

    public function type()
    {
        if ($this->entity->type == 1) {
            return 'Administrador';
        } else if ($this->entity->type == 0) {
            return 'Usuario';
        }
    }
}
