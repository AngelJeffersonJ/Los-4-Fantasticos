<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'ID_Inventario';
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto', 'id');
    }
}


