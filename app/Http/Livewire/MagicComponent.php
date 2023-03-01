<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MagicComponent extends Component
{
    public $mensaje = "Esto es otra propiedad";
    public $title;

    public function mount(){
      $this->title = "Magic actions y Eventos";
    }
    public function render()
    {
        return view('livewire.magic-component');
    }
    public function changeSelect($value)
    {
        $this->mensaje = $value;
    }
}