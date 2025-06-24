<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //

    use HasFactory;

    protected $fillable = ['contenido', 'tarea_id', 'user_id'];


    public function tarea() { return $this->belongsTo(Tarea::class); }
    public function usuario() { return $this->belongsTo(User::class, 'user_id'); }
}
