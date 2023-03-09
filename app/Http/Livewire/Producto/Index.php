<?php

namespace App\Http\Livewire\Producto;

use App\Models\Producto;
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
        $this->title = "Productos";
        return view('livewire.producto.index', [
            "productos" => Producto::where('cantidad', 'like', '%' . $this->search . '%')->paginate($this->pagina)
        ])
        ->extends('layouts.app', ['title' => 'Productos'])
        ->section('content');
    }



/* 
Con ->extends('layout.app') especifico el componente usará el layout principal (views/layout/app.blade.php)
Es como si en el html del componente o de la vista que contenga la componente yo pusiera
@extends('layouts.app') 
Con ->section('content') especifico que el componente se colocará en la sección content del layou
Es como si en el html del componente d de la vista que contenga al componente yo pusiera
@section('content')
*/
}