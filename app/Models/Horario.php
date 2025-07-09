<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    use HasFactory;

    protected $fillable = ['doctor_id', 'dia_semana', 'hora_inicio', 'hora_fin', 'estado'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
