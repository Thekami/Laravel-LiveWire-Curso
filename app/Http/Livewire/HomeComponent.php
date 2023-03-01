<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use Livewire\Component;

class HomeComponent extends Component
{
    public $title;

    public function mount(){
      $this->title = "Home";
      // dd($this->personas);
    }
    public function render()
    {
        return view('livewire.home-component');
    }

}