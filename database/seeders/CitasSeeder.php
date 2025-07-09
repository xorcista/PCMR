<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cita;

class CitasSeeder extends Seeder
{
    public function run(): void
    {
        Cita::create([
            'user_id' => 3,
            'doctores_id' => 1,
            'horarios_id' => 1,
            'fecha' => now()->addDays(2)->format('Y-m-d'),
            'motivo' => 'Consulta de control general',
            'estado' => 'pendiente'
        ]);
    }
}
