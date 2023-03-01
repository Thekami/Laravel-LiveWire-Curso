<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class ChildComponent extends Component
{
    public $persona;

    public function mount(Persona $persona){
      $this->persona = $persona;
    }
    public function render()
    {
        // dd($this->personasChild);
        return view('livewire.child-component');
    }
}
