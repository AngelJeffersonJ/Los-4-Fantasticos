<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Corregir el nombre de la tabla

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];
}
