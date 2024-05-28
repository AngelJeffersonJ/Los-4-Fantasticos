<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        // Deshabilitar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar la tabla
        DB::table('proveedores')->truncate();

        // Habilitar verificaciones de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertar datos
        DB::table('proveedores')->insert([
            ['id' => 1, 'nombre' => 'Proveedor 1', 'direccion' => 'Calle 123', 'telefono' => '123-456-7890', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'nombre' => 'Proveedor 2', 'direccion' => 'Avenida XYZ', 'telefono' => '987-654-3210', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'nombre' => 'Proveedor 3', 'direccion' => 'Carrera ABC', 'telefono' => '555-555-5555', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'nombre' => 'Proveedor 4', 'direccion' => 'Puerto Rico', 'telefono' => '4496788909', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'nombre' => 'Proveedor 5', 'direccion' => 'Casi llegó', 'telefono' => '4496577898', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'nombre' => 'Proveedor 6', 'direccion' => 'Lomas de Ajedrez', 'telefono' => '4496578998', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
