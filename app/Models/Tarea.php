<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'estado', 'proyecto_id'];


    public function proyecto() { return $this->belongsTo(Proyecto::class); }
    public function comentarios() { return $this->hasMany(Comentario::class); }
}
