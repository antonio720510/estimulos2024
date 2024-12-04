<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroSomatometriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroSomatometria', function (Blueprint $table) {
            $table->id();
            $table->integer('numEmpleado');
            $table->integer('idEmpleado');
            $table->string('paterno',80);
            $table->string('materno',80);
            $table->string('nombre',80);
            $table->date('fechaRegistro');
            $table->integer('estatus');

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
        Schema::dropIfExists('registroSomatometria');
    }
}
