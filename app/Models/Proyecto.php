<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //

    use HasFactory;

    protected $fillable = ['nombre', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
