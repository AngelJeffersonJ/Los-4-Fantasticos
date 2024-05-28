<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Deshabilitar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar la tabla
        DB::table('productos')->truncate();

        // Habilitar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertar datos
        DB::table('productos')->insert([
            ['id' => 4, 'nombre' => 'Placa de metal', 'descripcion' => 'vieja ?', 'precio_unitario' => 153.00, 'stock' => 5, 'id_categoria' => 1, 'id_proveedor' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'nombre' => 'llave inglesa', 'descripcion' => '1/4"\n5/16"\n3/8"\n7/16"\n1/2"\n9/16"\n5/8"\n11/16"\n3/4"\n13/16"\n7/8"\n15/16"\n1"\n1 1/16"\n1 1/8"', 'precio_unitario' => 150.00, 'stock' => 344, 'id_categoria' => 1, 'id_proveedor' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'nombre' => 'llave trinquete', 'descripcion' => 'Llaves de trinquete 6MM-17MM llaves universales para reparación de automóviles herramientas de mano.', 'precio_unitario' => 120.00, 'stock' => 233, 'id_categoria' => 1, 'id_proveedor' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'nombre' => 'Matillo', 'descripcion' => 'Herramienta utilizada para golpear, clavar, desclavar, empujar, calzar partes, romper o deformar objetos.', 'precio_unitario' => 459.00, 'stock' => 23, 'id_categoria' => 1, 'id_proveedor' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
