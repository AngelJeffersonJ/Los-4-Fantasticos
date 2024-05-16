<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /**
     * The tablxe associated with the model.
     *
     * @var string
     */
    protected $table = 'ventas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'id_cliente',
    ];

    /**
     * Get the cliente that owns the venta.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    /**
     * Get the detalles for the venta.
     */
    public function detalles()
    {
        return $this->hasMany(VentaDetalle::class, 'id_venta');
    }
}