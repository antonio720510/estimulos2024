<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleUniformeEmpleado extends Model
{
    use HasFactory;
    protected $table = 'detalleuniformeempleado';
    protected $fillable = ['uniformeempleado_id', 'tipoprenda','talla'];
}
