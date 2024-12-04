<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblempleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempleados', function (Blueprint $table) {
            $table->id();
            $table->string('item',10);
            $table->string('nombre',50);
            $table->string('correo',50);
            $table->string('telefono',20);
            $table->string('categoria',100);
            $table->string('unidadadmva',200);
            $table->string('tipo_plaza',25);
            $table->string('genero',10);
            $table->string('inmueble',150);
            $table->string('municipio',100);
            $table->string('sede',50);
            $table->string('dia',30);
            $table->string('hora',25);
            $table->string('administrativo_proximidad',25);
            $table->string('administrativo_mp',5);
            $table->string('ejecutivo_pdi',5);
            $table->string('tactico',5);
            $table->string('campo',5);
            $table->string('periciales',5);
            $table->integer('recepcion');          
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
        Schema::dropIfExists('tblempleados');
    }
}
