<?php

namespace App\Http\Livewire\Producto;

use App\Models\Bitacora;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['categoriaChanged' => 'actualizarCategoria'];
    public $nombre;
    public $precio;
    public $cantidad;
    public $title;
    public $categorias = [];
    public $categoria;

    protected $rules = [
        'nombre' => 'required|min:5',
        'cantidad' => 'required|numeric|min:0',
        'precio' => 'required|numeric|min:0',
        'categoria' => 'required'
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.min' => 'El campo nombre debe contener por lo menos 5 caracteres.',
        'cantidad.required' => 'El campo cantidad es obligatorio.',
        'cantidad.numeric' => 'El campo cantidad solo acepta números.',
        'cantidad.min' => 'El campo cantidad no debe ser menor a 0.',
        'precio.required' => 'El campo precio es obligatorio.',
        'precio.numeric' => 'El campo precio solo acepta números.',
        'precio.min' => 'El campo precio no debe ser menor a 0.',
        'categoria.required' => 'El campo categoria es obligatorio.',
    ];

    public function actualizarCategoria($value){
        $this->categoria = $value;
    }

    public function mount(){
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
        $this->categorias = Categoria::all();
        // dd(Categoria::all());
    }
    public function render()
    {
        $this->title = "Nuevo producto";
        return view('livewire.producto.create')
            ->extends('layouts.app', ['title' => 'Productos'])
            ->section('content');
    }

    // Validar en tiempo real los campos
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validarCampos = $this->validate();

        try {
            $datos = array_replace($validarCampos, array("categoria_id" => $this->categoria));
            Producto::create($datos);
            return redirect()->route('producto.index')->with('success', 'Producto guardado exitosamente');
        } catch (\Throwable $error) {
            // Avisar por JS de un error inesperado;
            $Bitacora = new Bitacora();
            $Bitacora->saveBitacora(Auth::id(), $this->title, $error);
            dd($error);
        }
    }
}