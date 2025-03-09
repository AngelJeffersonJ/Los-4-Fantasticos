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
        'precio',
        'tiempo_entrega'
    ];

    /**
     * Relación con productos: Un proveedor puede tener muchos productos.
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor');
    }
}
