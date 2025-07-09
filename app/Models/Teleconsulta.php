<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teleconsulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'link_virtual',
        'estado'
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
