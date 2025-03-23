<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'precio',
        'tiempo_entrega'
    ];

    // Relación con ProductoProveedor
    public function productosDisponibles()
    {
        return $this->hasMany(ProductoProveedor::class, 'id_proveedor');
    }
}
