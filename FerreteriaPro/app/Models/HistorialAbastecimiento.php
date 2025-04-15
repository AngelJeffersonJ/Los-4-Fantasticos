<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialAbastecimiento extends Model
{
    use HasFactory;

    protected $table = 'historial_abastecimientos';

    protected $fillable = [
        'id_producto',
        'id_proveedor',
        'cantidad',
        'precio',
        'fecha_envio'
    ];

    protected $dates = ['fecha_envio']; // Añade claramente esto


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
