<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'salario', 'direccion', 'telefono', 'foto', 'estatus'];

    public function empleado_estatus()
    {
        return $this->belongsTo(EmpleadosEstatus::class, 'estatus');
    }
}
