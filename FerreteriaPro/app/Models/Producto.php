<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'precio_unitario', 'stock'
    ];
}