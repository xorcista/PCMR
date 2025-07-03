<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DepartamentosCiudadesSeeder::class,
            EspecialidadesSeeder::class,
            AdminUserSeeder::class,
            CentrosSaludSeeder::class,
            MedicosSeeder::class,
            PacientesSeeder::class,
        ]);
    }
}