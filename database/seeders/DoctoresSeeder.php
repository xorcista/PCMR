<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctoresSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'dni' => '12345678',
            'telefono' => '987654321',
            'email' => 'juan.perez@example.com',
            'especialidades_id' => 1,
            'centros_salud_id' => 1,
        ]);

        Doctor::create([
            'nombres' => 'María',
            'apellidos' => 'Gómez',
            'dni' => '23456789',
            'telefono' => '912345678',
            'email' => 'maria.gomez@example.com',
            'especialidades_id' => 2,
            'centros_salud_id' => 1,
        ]);

        Doctor::create([
            'nombres' => 'Carlos',
            'apellidos' => 'Ramírez',
            'dni' => '34567890',
            'telefono' => '913456789',
            'email' => 'carlos.ramirez@example.com',
            'especialidades_id' => 3,
            'centros_salud_id' => 2,
        ]);

        Doctor::create([
            'nombres' => 'Ana',
            'apellidos' => 'López',
            'dni' => '45678901',
            'telefono' => '914567890',
            'email' => 'ana.lopez@example.com',
            'especialidades_id' => 4,
            'centros_salud_id' => 2,
        ]);

        Doctor::create([
            'nombres' => 'Luis',
            'apellidos' => 'Torres',
            'dni' => '56789012',
            'telefono' => '915678901',
            'email' => 'luis.torres@example.com',
            'especialidades_id' => 5,
            'centros_salud_id' => 3,
        ]);

        Doctor::create([
            'nombres' => 'Elena',
            'apellidos' => 'Castro',
            'dni' => '67890123',
            'telefono' => '916789012',
            'email' => 'elena.castro@example.com',
            'especialidades_id' => 6,
            'centros_salud_id' => 3,
        ]);

        Doctor::create([
            'nombres' => 'Diego',
            'apellidos' => 'Mendoza',
            'dni' => '78901234',
            'telefono' => '917890123',
            'email' => 'diego.mendoza@example.com',
            'especialidades_id' => 1,
            'centros_salud_id' => 1,
        ]);

        Doctor::create([
            'nombres' => 'Lucía',
            'apellidos' => 'Reyes',
            'dni' => '89012345',
            'telefono' => '918901234',
            'email' => 'lucia.reyes@example.com',
            'especialidades_id' => 4,
            'centros_salud_id' => 2,
        ]);

        Doctor::create([
            'nombres' => 'José',
            'apellidos' => 'Rojas',
            'dni' => '90123456',
            'telefono' => '919012345',
            'email' => 'jose.rojas@example.com',
            'especialidades_id' => 3,
            'centros_salud_id' => 3,
        ]);

        Doctor::create([
            'nombres' => 'Patricia',
            'apellidos' => 'Fernández',
            'dni' => '01234567',
            'telefono' => '920123456',
            'email' => 'patricia.fernandez@example.com',
            'especialidades_id' => 6,
            'centros_salud_id' => 1,
        ]);
    }
}
