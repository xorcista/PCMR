<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Doctor Demo',
            'email' => 'doctor@demo.com',
            'password' => bcrypt('doctor123'),
            'rol' => 'doctor',
        ]);

        User::create([
            'name' => 'Paciente Demo',
            'email' => 'paciente@demo.com',
            'password' => bcrypt('paciente123'),
            'rol' => 'paciente',
        ]);

    }
}
