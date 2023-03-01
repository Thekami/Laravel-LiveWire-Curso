<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class HomeComponent extends Component
{
    public $mensaje = "Esto es una propiedad mostrada";
    public $mensaje2 = "Esto es otra propiedad";
    public $contador = 0;
    public $personas;

    public function mount(){
      $this->personas = Persona::all();
      // dd($this->personas);
    }
    public function render()
    {
        return view('livewire.home-component');
    }

    public function add($param)
    {
        return $this->contador += $param;
    }

    public function store(){
      return $this->contador = 20;
    }

    public function changeSelect($value){
      $this->mensaje2 = $value;
    }
}