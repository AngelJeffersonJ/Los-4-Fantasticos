<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $fillable = [
        'id_venta', 'id_producto', 'cantidad', 'precio_unitario'
    ];

    public function venta()
    {
        return $this->belongsTo('App\Venta', 'id_venta');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto');
    }
}
