<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaRemota extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'medico_id',
        'cita_id',
        'motivo',
        'sintomas',
        'diagnostico',
        'tratamiento',
        'estado',
        'sala_id',
        'inicio_consulta',
        'fin_consulta',
    ];

    protected $casts = [
        'sintomas' => 'array',
        'inicio_consulta' => 'datetime',
        'fin_consulta' => 'datetime',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}