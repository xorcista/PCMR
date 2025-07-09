<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctores';

    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'email',
        'especialidades_id',
        'centros_salud_id'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidades_id');
    }

    public function centroSalud()
    {
        return $this->belongsTo(CentroSalud::class, 'centros_salud_id');
    }
}
