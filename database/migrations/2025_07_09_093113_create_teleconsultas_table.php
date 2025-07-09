<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleconsultasTable extends Migration
{
    public function up(): void
    {
        Schema::create('teleconsultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cita_id')->constrained('citas')->onDelete('cascade');
            $table->string('link_virtual'); // simulación de sala
            $table->enum('estado', ['pendiente', 'en_curso', 'finalizada'])->default('pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teleconsultas');
    }
}
