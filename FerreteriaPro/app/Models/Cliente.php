<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono'
    ];

    public function ventas()
    {
        return $this->hasMany('App\Venta', 'id_cliente');
    }
}
