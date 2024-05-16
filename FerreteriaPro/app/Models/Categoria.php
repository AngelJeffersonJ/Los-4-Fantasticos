<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at'
    ];

    // Relación uno a muchos con la tabla de productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
