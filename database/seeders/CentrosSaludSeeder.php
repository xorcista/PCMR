<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CentroSalud;

class CentrosSaludSeeder extends Seeder
{
    public function run(): void
    {
        CentroSalud::insert([
            ['nombre' => 'Centro Médico Huánuco', 'direccion' => 'Av. Bolívar 123', 'telefono' => '062123456', 'distrito' => 'Huánuco'],
            ['nombre' => 'Posta de Salud Amarilis', 'direccion' => 'Calle Central 456', 'telefono' => '062234567', 'distrito' => 'Amarilis'],
            ['nombre' => 'Centro de Salud Margos', 'direccion' => 'Plaza Principal s/n', 'telefono' => '062345678', 'distrito' => 'Margos'],
        ]);
    }
}
