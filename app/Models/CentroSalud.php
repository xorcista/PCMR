<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroSalud extends Model
{
    protected $table = 'centros_salud';

    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'telefono', 'distrito'];

    public function doctores()
    {
        return $this->hasMany(Doctor::class);
    }
}
