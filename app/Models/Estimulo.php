<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimulo extends Model
{
    use HasFactory;
    //protected $table = 'EmpleadosEstimulo';
    //protected $fillable = ['numEmpleado', 'idEmpleado','paterno','materno','nombre','fechaRegistro','estatus'];
    protected $table = 'horariosEstimulo2024';
    protected $fillable = ['numEmpleado', 'paterno','materno','nombre','fechaRegistro','estatus', 'fechaentrega','horario'];
}
