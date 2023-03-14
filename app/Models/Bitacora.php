<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Bitacora
 */
class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = ['usuario', 'donde', 'mensaje', 'json'];

    /**
     * Summary of save
     * @return void
     */
    public function saveBitacora($usuario, $donde, $error){

        try {
            $bitacora = [
                "usuario" => $usuario,
                "donde" => $donde,
                "mensaje" => $error->getMessage(),
                "json" => json_encode($error)
            ];
            Bitacora::create($bitacora);
        } catch (\Throwable $th) {
            dd($th);
        }

    }
}
