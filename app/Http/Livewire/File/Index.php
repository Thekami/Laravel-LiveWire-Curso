<?php

namespace App\Http\Livewire\File;

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
        $this->title = "Archivos";
        return view('livewire.file.index')
        ->extends('layouts.app', ['title' => 'Productos'])
        ->section('content');;
    }
}
