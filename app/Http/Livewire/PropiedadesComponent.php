<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PropiedadesComponent extends Component
{
    public $mensaje = "Esto es una propiedad";
    public $title;

    public function mount(){
      $this->title = "Propiedades y Data Binding";
    }
    public function render()
    {
        return view('livewire.propiedades-component');
    }
}
