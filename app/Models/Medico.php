<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'especialidad_id',
        'centro_salud_id',
        'biografia',
        'numero_colegiado',
        'horarios_disponibles',
        'disponible_telemedicina',
    ];

    protected $casts = [
        'horarios_disponibles' => 'array',
        'disponible_telemedicina' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function centroSalud()
    {
        return $this->belongsTo(CentroSalud::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function consultasRemotas()
    {
        return $this->hasMany(ConsultaRemota::class);
    }

    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class);
    }
}
