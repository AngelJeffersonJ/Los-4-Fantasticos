<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            [
                'id' => 4,
                'nombre' => 'Placa de metal',
                'descripcion' => 'vieja ?',
                'precio_unitario' => 153.00,
                'stock' => 5,
                'id_categoria' => 5,
                'id_proveedor' => 3,
                'created_at' => Carbon::parse('2024-05-26 22:41:16'),
                'updated_at' => Carbon::parse('2024-05-27 04:26:07')
            ],
            [
                'id' => 5,
                'nombre' => 'llave inglesa',
                'descripcion' => '1/4"\n5/16"\n3/8"\n7/16"\n1/2"\n9/16"\n5/8"\n11/16"\n3/4"\n13/16"\n7/8"\n15/16"\n1"\n1 1/16"\n1 1/8"',
                'precio_unitario' => 150.00,
                'stock' => 344,
                'id_categoria' => 6,
                'id_proveedor' => 5,
                'created_at' => Carbon::parse('2024-05-27 04:34:48'),
                'updated_at' => Carbon::parse('2024-05-27 04:39:46')
            ],
            [
                'id' => 6,
                'nombre' => 'llave trinquete',
                'descripcion' => 'Llaves de trinquete 6MM-17MM llaves universales para reparación de automóviles herramientas de mano.',
                'precio_unitario' => 120.00,
                'stock' => 233,
                'id_categoria' => 7,
                'id_proveedor' => 6,
                'created_at' => Carbon::parse('2024-05-27 04:40:25'),
                'updated_at' => Carbon::parse('2024-05-27 04:47:19')
            ],
            [
                'id' => 7,
                'nombre' => 'Martillo',
                'descripcion' => 'Herramienta utilizada para golpear, clavar, desclavar, empujar, calzar partes, romper o deformar objetos.',
                'precio_unitario' => 459.00,
                'stock' => 23,
                'id_categoria' => 8,
                'id_proveedor' => 7,
                'created_at' => Carbon::parse('2024-05-27 04:45:55'),
                'updated_at' => Carbon::parse('2024-05-27 04:49:08')
            ],
        ]);
    }
}