<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Asegura que Laravel use la tabla correcta

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_unitario',
        'stock',
        'id_categoria',
        'id_proveedor',
    ];

    // Relación con Categoría (Muchos a Uno)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Relación con Proveedor (Muchos a Uno)
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    // Simulación de estado del stock
    public function getEstadoStockAttribute()
    {
        if ($this->stock < 10) {
            return ['estado' => 'Bajo', 'class' => 'bg-danger'];
        } elseif ($this->stock < 30) {
            return ['estado' => 'Medio', 'class' => 'bg-warning'];
        } else {
            return ['estado' => 'Alto', 'class' => 'bg-success'];
        }
    }

    // Simulación de selección de proveedor recomendado basado en precio y tiempo de entrega
    public function proveedorSugerido()
    {
        return Proveedor::orderBy('precio', 'asc')->orderBy('tiempo_entrega', 'asc')->first();
    }
}
