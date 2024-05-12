<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'ID_Venta';
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente', 'id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado', 'id');
    }

    public function detalleVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Venta', 'id');
    }
}
