<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $fillable = [
        'id_producto', 'cantidad_disponible', 'cantidad_minima', 'cantidad_maxima'
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'id_producto');
    }
}
