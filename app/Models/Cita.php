<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    use HasFactory;

    protected $fillable = [
        'user_id',          // paciente
        'doctores_id',
        'horarios_id',
        'fecha',
        'motivo',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctores_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horarios_id');
    }
}
