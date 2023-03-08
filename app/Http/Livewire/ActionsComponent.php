<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActionsComponent extends Component
{
    public $contador = 0;
    public $title;

    public function mount(){
      $this->title = "Actions";
    }
    public function add($param)
    {
        return $this->contador += $param;
    }

    public function store()
    {
        return $this->contador = 20;
    }
    public function render()
    {
        return view('livewire.actions-component');
    }
}