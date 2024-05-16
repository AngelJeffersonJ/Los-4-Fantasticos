<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class VentaDetalle extends Model
{
    protected $table = 'venta_detalles';
    protected $fillable = [
        'id_venta',
        'id_producto',
        'cantidad',
        'precio_unitario',
    ];

    /**
     * Obtener la venta asociada al detalle.
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    /**
     * Obtener el producto asociado al detalle.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}