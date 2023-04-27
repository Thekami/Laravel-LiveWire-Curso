<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Bitacora;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    protected $listeners = ['sendAlert'];
    public $title = "Editar empleado";
    public Empleado $empleado;
    public $foto;
    public $estatus = 1;

    private $error = [
        "titulo" => "Atención",
        "mensaje" => "Ha ocurrido un error inesperado, intentelo mas tarde o pongase en contacto con el administrador del sistema",
        "icono" => "error"
    ];

    protected $rules =[
        'empleado.nombre' => ['required', 'min:3'],
        'empleado.codigo' => ['required', 'max:50'],
        'empleado.salario' => ['required', 'numeric', 'min:0'],
        'empleado.direccion' => ['required', 'max:255'],
        'empleado.telefono' => ['required', 'max:45'],
        'foto' => ['nullable', 'sometimes', 'max:1024', 'mimes:png,jpg,jpeg']
    ];

    protected $messages = [
        'empleado.nombre.required' => 'El campo nombre es obligatorio.',
        'empleado.nombre.min' => 'El campo nombre debe contener por lo menos 3 caracteres.',
        'empleado.codigo.required' => 'El campo código es obligatorio.',
        'empleado.codigo.max' => 'El campo código debe máximo 50 caracteres.',
        'empleado.salario.required' => 'El campo salario es obligatorio.',
        'empleado.salario.numeric' => 'El campo salario solo acepta números.',
        'empleado.salario.min' => 'El campo salario no debe ser menor a 0.',
        'empleado.telefono.required' => 'El campo telefono es obligatorio.',
        'empleado.telefono.max' => 'El campo telefono debe máximo 45 caracteres.',
        'foto.required' => 'El campo file es obligatorio',
        'foto.mimes' => 'Los tipos de archivos permitodos son: JPG, PNG, JPEG y PDF',
        'foto.max' => 'El tamaño máximo permitido para el archivo es de 1MB'
    ];

    public function mount(Empleado $empleado){
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
       $this->empleado = $empleado;
    }
    
    public function render()
    {
        $this->title = "Actualizar empleado";
        return view('livewire.empleado.edit')
        ->extends('layouts.app', ['title' => 'Actualizar empleado'])
        ->section('content');;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function sendAlert(){
        $this->dispatchBrowserEvent('alert');
    }

    public function edit(){

        $data = $this->validate();
        
        try {

            $nuevaFoto = $this->foto ? 'storage/' . $this->foto->store('empleados', 'public') : $this->empleado->foto;
    
            $this->empleado->update(["foto" => $nuevaFoto] + $data);

            return redirect()->route('empleado.index')->with('success', 'Empleado actualizado exitosamente');
    
        } catch (\Throwable $error) {

            $this->dispatchBrowserEvent('alert', $this->error);

            $Bitacora = new Bitacora();
            $Bitacora->saveBitacora(Auth::id(), $this->title, $error);

        }
        
    }

}
