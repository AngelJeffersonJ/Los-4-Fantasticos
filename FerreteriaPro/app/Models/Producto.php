<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_unitario',
        'stock',
        'id_categoria',
        'id_proveedor'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'id_producto');
    }

    public function proveedoresDisponibles()
    {
        return $this->hasMany(ProductoProveedor::class, 'id_producto');
    }
}
