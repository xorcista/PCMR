<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrosSaludTable extends Migration
{
    public function up(): void
    {
        Schema::create('centros_salud', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('distrito')->nullable(); // opcional para ubicar zona rural
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centros_salud');
    }
}
