<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Bitacora;
use App\Models\Empleado;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    protected $listeners = ['sendAlert'];
    public $title, $nombre, $codigo, $salario, $direccion, $telefono, $foto, $estatus = 1;
    private $error = [
        "titulo" => "Atención",
        "mensaje" => "Ha ocurrido un error inesperado, intentelo mas tarde o pongase en contacto con el administrador del sistema",
        "icono" => "error"
    ];
    protected $rules =[
        'nombre' => ['required', 'min:3'],
        'codigo' => ['required', 'max:50'],
        'salario' => ['required', 'numeric', 'min:0'],
        'direccion' => ['required', 'max:255'],
        'telefono' => ['required', 'max:45'],
        'foto' => ['required', 'max:1024', 'mimes:png,jpg,jpeg']
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El campo nombre debe contener por lo menos 3 caracteres.',
        'codigo.required' => 'El campo código es obligatorio.',
        'codigo.max' => 'El campo código debe máximo 50 caracteres.',
        'salario.required' => 'El campo salario es obligatorio.',
        'salario.numeric' => 'El campo salario solo acepta números.',
        'salario.min' => 'El campo salario no debe ser menor a 0.',
        'telefono.required' => 'El campo telefono es obligatorio.',
        'telefono.max' => 'El campo telefono debe máximo 45 caracteres.',
        'foto.required' => 'El campo file es obligatorio',
        'foto.mimes' => 'Los tipos de archivos permitodos son: JPG, PNG, JPEG y PDF',
        'foto.max' => 'El tamaño máximo permitido para el archivo es de 1MB'
    ];

    public function mount(){
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
    }
    
    public function render(){
        $this->title = "Nuevo empleado";
        return view('livewire.empleado.create')
            ->extends('layouts.app', ['title' => 'Empleados'])
            ->section('content');
    }
    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function sendAlert(){
      $this->dispatchBrowserEvent('alert');
    }

    public function save(){
        $data = $this->validate();

        try {
            $nuevaFoto = $this->foto ? 'storage/' . $this->foto->store('empleados', 'public') : null;

            Empleado::create(["foto" => $nuevaFoto, "estatus" => $this->estatus] + $data);
            
            return redirect()->route('empleado.index')->with('success', 'Empleado creado exitosamente');
       
        } catch (\Throwable $error) {
            
            $this->dispatchBrowserEvent('alert', $this->error);

            $Bitacora = new Bitacora();
            $Bitacora->saveBitacora(Auth::id(), $this->title, $error);

        }
    }
}
