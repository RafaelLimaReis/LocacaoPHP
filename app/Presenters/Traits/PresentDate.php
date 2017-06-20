<?php

namespace App\Presenters\Traits;

trait PresentDate
{
    private $dateFormat = 'd/m/Y';
    private $dateTimeFormat = 'd/m/Y H:i:s';

    public function __get($property)
    {
        if(!method_exists($this, $property) && in_array($property, $this->entity->getDates())) {
            return $this->entity->{$property}->format($this->dateFormat);
        }

        return parent::__get($property);
    }

    public function created_at()
    {
        return $this->entity->created_at->format($this->dateTimeFormat);
    }

    public function updated_at()
    {
        return $this->entity->updated_at->format($this->dateTimeFormat);
    }
}
