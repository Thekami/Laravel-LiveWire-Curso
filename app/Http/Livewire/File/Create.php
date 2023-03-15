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

    public $files = [];
    public $title;

    protected $rules = [
        'files.*' => ['required', 'max:1024', 'mimes:png,jpg,jpeg,pdf']
    ];

    protected $messages = [
        'files.*.required' => 'El campo file es obligatorio',
        'files.*.mimes' => 'Los tipos de archivos permitodos son: JPG, PNG, JPEG y PDF',
        'files.*.max' => 'El tamaño máximo permitido para el archivo es de 1MB'
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

    // public function updatedPhoto()
    // {
    //     $this->validate();
    // }

    public function save()
    {
        $this->validate();

        try {

            foreach ($this->files as $file) {
                $myFile = new File();
                $myFile->nombre = $file->getClientOriginalName();
                $myFile->extencion = $file->extension();
                $myFile->ruta = 'storage/' . $file->store('files', 'public');
                $myFile->save();
            }

            return redirect()->route('file')->with('success', 'Archivo(s) guardado exitosamente');

        } catch (\Throwable $error) {
            // Avisar por JS de un error inesperado;
            $Bitacora = new Bitacora();
            $Bitacora->saveBitacora(Auth::id(), $this->title, $error);
            dd($error);
        }

    }
}