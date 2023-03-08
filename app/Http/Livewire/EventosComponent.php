<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EventosComponent extends Component
{
    public $nombre;
    public $email;
    public $title;

    public $user;
    protected $listeners = ['resetData', 'cargarUserInfo']; // Listeners para que tenga efecto el evento en la vista

    public function mount()
    {
        //$this->title = "Eventos";
    }

    public function render()
    {
        $this->title = "Eventos";
        return view('livewire.eventos-component');
    }

    /* *** Eventos *** */

    public function save()
    {
        $this->emit('success'); // Detona un evento que será escuchado por JS en la vista eventos.blade.php
        // $this->dispatchBrowserEvent('success2');
        $this->resetData();
    }

    public function save2()
    {
        $this->dispatchBrowserEvent('success2', [
            "title" => "Forma 2",
            "text" => "Esta es una OTRA forma de escuchar un evento",
            "icon" => "question"
        ]);
        $this->resetData();
    }
    public function resetData() // Función detonada desde un evento en la vista
    {
        $this->reset(); // Resetea todas las propiedades;
    }

    public function cargarUserInfo(User $user) // Función detonada desde un evento en la vista
    {
        //$data = User::where('id', $user['id'])->get();

        $this->nombre = $user["name"];
        $this->email = $user["email"];
    }
}