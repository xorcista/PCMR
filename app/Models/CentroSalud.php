<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroSalud extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'descripcion',
        'direccion',
        'ciudad',
        'departamento',
        'telefono',
        'email',
        'latitud',
        'longitud',
        'hora_apertura',
        'hora_cierre',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }

    public function citas()
    {
        return $this->hasManyThrough(Cita::class, Medico::class);
    }
}