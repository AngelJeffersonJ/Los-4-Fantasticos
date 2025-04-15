<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraCliente extends Model
{
    protected $table = 'compras_cliente';

    protected $fillable = [
        'user_id',
        'productos',
        'total',
    ];

    protected $casts = [
        'productos' => 'array',
    ];
}
