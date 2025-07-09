<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    
    use HasFactory;

    protected $fillable = ['nombre'];

    public function doctores()
    {
        return $this->hasMany(Doctor::class);
    }
}
