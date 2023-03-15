<?php

namespace App\Http\Livewire\File;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
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
        $this->title = "Archivos";
        return view('livewire.file.index', [
            // "files" => File::all() 
            "files" => File::where('nombre', 'like', '%'.$this->search.'%')->paginate($this->pagina)
            // "files" => File::orderByDesc('id')->paginate($this->pagina)
        ])
        ->extends('layouts.app', ['title' => 'Archivos'])
        ->section('content');
    }
}
