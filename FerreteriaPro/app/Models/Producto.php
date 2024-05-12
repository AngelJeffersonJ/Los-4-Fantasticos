<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'ID_Producto';
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_Categoria', 'id');
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor', 'id');
    }
}
