<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    public function up(): void
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('dni', 8)->unique();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('especialidades_id');
            $table->unsignedBigInteger('centros_salud_id');
            $table->timestamps();

            $table->foreign('especialidades_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->foreign('centros_salud_id')->references('id')->on('centros_salud')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctores');
    }
}
