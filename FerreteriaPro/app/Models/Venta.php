<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'fecha', 'id_cliente'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    public function detalles()
    {
        return $this->hasMany('App\VentaDetalle', 'id_venta');
    }
}
