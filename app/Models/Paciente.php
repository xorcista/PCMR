<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha_nacimiento',
        'genero',
        'altura',
        'peso',
        'tipo_sangre',
        'alergias',
        'condiciones_medicas',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'alergias' => 'array',
        'condiciones_medicas' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function consultasRemotas()
    {
        return $this->hasMany(ConsultaRemota::class);
    }
}