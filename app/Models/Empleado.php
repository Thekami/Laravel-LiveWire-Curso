<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'salario', 'direccion', 'telefono', 'estatus'];

    public function estatus()
    {
        return $this->belongsTo(EmpleadoEstatus::class, 'estatus');
    }
}
