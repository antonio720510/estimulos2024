<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Somatometria extends Model
{
    use HasFactory;
    //protected $table = 'registroSomatometria';
    protected $table = 'EmpleadosSomatometria';
    protected $fillable = ['numEmpleado', 'idEmpleado','paterno','materno','nombre','fechaRegistro','estatus'];
}
