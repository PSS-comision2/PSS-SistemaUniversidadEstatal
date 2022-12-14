<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = "carreras";
    public $timestamps = false;

    public function carrera_materia() {
        return $this->belongsToMany(Materia::class, 'tiene', 'id_carrera', 'id_materia');
    }
}
