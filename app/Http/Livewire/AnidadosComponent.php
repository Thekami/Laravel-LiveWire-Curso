<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class AnidadosComponent extends Component
{
    public $title;
    public $personas;

    public function mount(){
      $this->title = "Componentes anidados";
      $this->personas = Persona::all();
    }
    public function render()
    {
        return view('livewire.anidados-component');
    }
}
