<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono'
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto', 'id_proveedor');
    }
}
