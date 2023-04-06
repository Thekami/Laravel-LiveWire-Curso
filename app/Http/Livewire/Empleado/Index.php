<?php

namespace App\Http\Livewire\Empleado;

use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title;
    public $search = '';
    public $pagina = 5;

    protected $queryString = ['search'];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
    }
    public function render()
    {
        // dd(File::orderByDesc('id'));
        $this->title = "Empleados";
        return view('livewire.empleado.index')
        ->extends('layouts.app', ['title' => 'Empleados'])
        ->section('content');
    }
}
