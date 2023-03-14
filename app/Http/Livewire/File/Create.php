<?php

namespace App\Http\Livewire\File;

use App\Models\Bitacora;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $file;
    public $title;

    protected $rules = [
        'file' => 'required|mimes:png,jpg,jpeg,pdf'
    ];

    protected $messages = [
        'file.required' => 'El campo file es obligatorio',
        'file.mimes' => 'Los tipos de archivos permitodos son: JPG, PNG, JPEG y PDF'
    ];
    public function mount()
    {
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
    }
    public function render()
    {
        $this->title = "Nuevo archivo";
        return view('livewire.file.create')
            ->extends('layouts.app', ['title' => 'Archivos'])
            ->section('content');
    }

    public function save()
    {
        $this->validate();
        
        try {
            $myFile = new File();
            $myFile->nombre = $this->file->getClientOriginalName();
            $myFile->extencion = $this->file->extension();
            $myFile->ruta = 'storage/'.$this->file->store('files', 'public');
            $myFile->save();

            return redirect()->route('file');

        } catch (\Throwable $error) {
            // Avisar por JS de un error inesperado;
            $Bitacora = new Bitacora();
            $Bitacora->saveBitacora(Auth::id(), $this->title, $error);
            dd($error);
        }
        
    }
}