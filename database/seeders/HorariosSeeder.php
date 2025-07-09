<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorariosSeeder extends Seeder
{
    public function run(): void
    {
        Horario::create([
            'doctor_id' => 1,
            'dia_semana' => 'Lunes',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '12:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 2,
            'dia_semana' => 'Martes',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '13:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 3,
            'dia_semana' => 'Miércoles',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '14:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 4,
            'dia_semana' => 'Jueves',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '12:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 5,
            'dia_semana' => 'Viernes',
            'hora_inicio' => '13:00:00',
            'hora_fin' => '17:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 6,
            'dia_semana' => 'Lunes',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '18:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 7,
            'dia_semana' => 'Martes',
            'hora_inicio' => '07:00:00',
            'hora_fin' => '11:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 8,
            'dia_semana' => 'Miércoles',
            'hora_inicio' => '15:00:00',
            'hora_fin' => '19:00:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 9,
            'dia_semana' => 'Jueves',
            'hora_inicio' => '08:30:00',
            'hora_fin' => '12:30:00',
            'estado' => 'activo'
        ]);

        Horario::create([
            'doctor_id' => 10,
            'dia_semana' => 'Viernes',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '14:00:00',
            'estado' => 'activo'
        ]);
    }
}
