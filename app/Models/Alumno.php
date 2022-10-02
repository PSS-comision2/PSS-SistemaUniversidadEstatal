<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = "alumnos";
    protected $primaryKey = "id_alumno";
    public $timestamps = false; 

    public function cursadas() {
        return $this->belongsToMany(Materia::class, 'cursadas', 'id_alumno', 'id_materia');
    }

    public function finales() {
        return $this->belongsToMany(ExamenFinal::class, 'examenfinales', 'id_alumno', 'id_examenfinal');
    }


}
