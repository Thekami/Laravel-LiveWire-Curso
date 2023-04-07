<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title;
    public $search = '';
    public $pagina = 3;

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
        $this->title = "Empleados";
        return view('livewire.empleado.index', [
            "empleados" => Empleado::where('codigo', 'like', '%' . $this->search . '%')->paginate($this->pagina)
        ])
        ->extends('layouts.app', ['title' => 'Empleados'])
        ->section('content');
    }
}
