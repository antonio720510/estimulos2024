<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $fillable = ['cveEmpleado', 'cveGenero','plaza', 'comentarios', 'tipoSangre','fechaRegistro'];
    public $timestamps = true;
}
