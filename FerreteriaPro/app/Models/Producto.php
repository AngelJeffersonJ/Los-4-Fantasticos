<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'precio_unitario', 'stock', 'id_categoria', 'id_proveedor'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

    public function ventas()
    {
        return $this->hasMany('App\VentaDetalle', 'id_producto');
    }
}
