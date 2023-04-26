<?php

namespace App\Http\Livewire\Empleado;

use App\Models\Bitacora;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete', 'reloadComponent' => 'render'];
    public $title;
    public $search = '';
    public $pagina = 5;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        if (is_null(Auth::user())) {
            return redirect()->route('home');
        }
    }
    public function render(){
        $this->title = "Empleados";
        return view('livewire.empleado.index', [
            "empleados" => Empleado::with('empleado_estatus')->where('nombre', 'like', '%' . $this->search . '%')->paginate($this->pagina)
        ])
        ->extends('layouts.app', ['title' => 'Empleados'])
        ->section('content');
    }

    public function deleteConfirm($id){
      $this->dispatchBrowserEvent('confirm', [
        'titulo' => '¡Atención!',
        'mensaje' => '¿Seguro deseas eliminar este registro?',
        'icon' => 'warning',
        'id' => $id
      ]);
    }

    public function delete($id){
      try {

        if(Empleado::where('id', $id)->delete()){
            $this->dispatchBrowserEvent('alert', [
              'titulo' => 'Felicidades!',
              'mensaje' => 'Empleado eliminado exitosamente',
              'icon' => 'success',
            ]);
        }

      } catch (\Throwable $error) {

        $this->dispatchBrowserEvent('alert', [
            'mensaje' => 'Error general',
        ]);

        $Bitacora = new Bitacora();
        $Bitacora->saveBitacora(Auth::id(), "Delete - ".$this->title, $error);
      }
      
    }
}
