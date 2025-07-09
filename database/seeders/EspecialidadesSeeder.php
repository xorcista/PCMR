<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadesSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
            'Medicina General',
            'Pediatría',
            'Odontología',
            'Ginecología',
            'Dermatología',
            'Cardiología',
        ];

        foreach ($especialidades as $nombre) {
            Especialidad::create(['nombre' => $nombre]);
        }
    }
}
