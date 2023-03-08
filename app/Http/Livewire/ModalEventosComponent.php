<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalEventosComponent extends Component
{
    protected $listeners = ['display-modal' => 'toggleModal'];
    public function render()
    {
        return view('livewire.modal-eventos-component');
    }

    public function toggleModal(){
        // $this->emit('show-modal');
        $this->dispatchBrowserEvent('show-modal');
    }
}
