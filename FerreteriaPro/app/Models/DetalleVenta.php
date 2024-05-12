<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'venta_detalle';
    protected $primaryKey = 'ID_DetalleVenta';
    
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_Venta', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto', 'id');
    }
}

