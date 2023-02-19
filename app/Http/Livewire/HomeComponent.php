<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public $mensaje = "Prueba de propiedad";
    public $contador = 0;
    public function render()
    {
        return view('livewire.home-component');
    }

    public function add($param)
    {
        return $this->contador += $param;
    }
}