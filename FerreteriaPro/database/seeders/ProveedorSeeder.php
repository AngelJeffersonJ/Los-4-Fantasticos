<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            [
                'id' => 1,
                'nombre' => 'Proveedor 1',
                'direccion' => 'Calle 123',
                'telefono' => '123-456-7890',
                'created_at' => Carbon::parse('2024-05-15 14:08:35'),
                'updated_at' => Carbon::parse('2024-05-15 14:08:35')
            ],
            [
                'id' => 2,
                'nombre' => 'Proveedor 2',
                'direccion' => 'Avenida XYZ',
                'telefono' => '987-654-3210',
                'created_at' => Carbon::parse('2024-05-15 14:08:35'),
                'updated_at' => Carbon::parse('2024-05-15 14:08:35')
            ],
            [
                'id' => 3,
                'nombre' => 'Proveedor 3',
                'direccion' => 'Carrera ABC',
                'telefono' => '555-555-5555',
                'created_at' => Carbon::parse('2024-05-15 14:08:35'),
                'updated_at' => Carbon::parse('2024-05-15 14:08:35')
            ],
            [
                'id' => 5,
                'nombre' => 'Proveedor 4',
                'direccion' => 'Puerto Rico',
                'telefono' => '4496788909',
                'created_at' => Carbon::parse('2024-05-27 04:31:08'),
                'updated_at' => Carbon::parse('2024-05-27 04:31:26')
            ],
            [
                'id' => 6,
                'nombre' => 'Proveedor 5',
                'direccion' => 'Casi llegó',
                'telefono' => '4496577898',
                'created_at' => Carbon::parse('2024-05-27 04:32:28'),
                'updated_at' => Carbon::parse('2024-05-27 04:32:28')
            ],
            [
                'id' => 7,
                'nombre' => 'Proveedor 6',
                'direccion' => 'Lomas de Ajedrez',
                'telefono' => '4496578998',
                'created_at' => Carbon::parse('2024-05-27 04:33:34'),
                'updated_at' => Carbon::parse('2024-05-27 04:33:34')
            ],
        ]);
    }
}