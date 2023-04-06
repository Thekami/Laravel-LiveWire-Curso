<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('codigo', 50);
            $table->decimal('salario', 12,2);
            $table->string('direccion', 255);
            $table->string('telefono', 45)->nullable();
            $table->text('foto')->nullable();
            $table->bigInteger('estatus')->unsigned();
            $table->foreign('estatus')->references('id')->on('empleados_estatuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
