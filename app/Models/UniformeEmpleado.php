<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniformeEmpleado extends Model
{
    use HasFactory;
    protected $fillable = ['registro_id', 'tipouniforme','cantidad'];
}
