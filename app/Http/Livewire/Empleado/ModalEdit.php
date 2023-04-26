<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Bitacora;
use App\Models\Empleado;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class ModalEdit extends Component
{
    use WithFileUploads;
    protected $listeners = ['showModalEdit'];
    public Empleado $empleado; 
    public $empleadoId;
    public $foto;

    protected $rules =[
        'empleado.nombre' => ['required', 'min:3'],
        'empleado.codigo' => ['required', 'max:50'],
        'empleado.salario' => ['required', 'numeric', 'min:0'],
        'empleado.direccion' => ['required', 'max:255'],
        'empleado.telefono' => ['required', 'max:45'],
        'foto' => ['required', 'max:1024', 'mimes:png,jpg,jpeg']
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

    public function mount(){
        // $this->empleado = $empleado;
        // $this->empleado = Empleado::where('id', $this->id);
        // $this->empleado = Empleado::find($this->empleadoId);
    }
    public function render()
    {
        // $this->empleado = Empleado::find($this->empleadoId);
        return view('livewire.empleado.modal-edit');
    }

    public function showModalEdit($id){
        $this->empleado = Empleado::find($id);
        $this->foto = null;
        $this->dispatchBrowserEvent('display-modal-edit');
    }

    public function edit(){

        $data = $this->validate();

        $nuevaFoto = $this->foto ? 'storage/' . $this->foto->store('empleados', 'public') : null;

        $this->empleado->update(["foto" => $nuevaFoto] + $data);

        $this->dispatchBrowserEvent('close-modal-edit', [
            "title" => "Felicidades",
            "text" => "El empleado ha sido actualizado satisfactoriamente",
            "icon" => "success"
        ]);
    }
}
