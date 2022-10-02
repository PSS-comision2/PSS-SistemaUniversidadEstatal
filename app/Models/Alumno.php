<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = "alumnos";
    protected $primaryKey = "LU";
    public $timestamps = false; 

    public function cursadas() {
        return $this->belongsToMany(Materia::class, 'cursadas', 'LU', 'codigo');
    }

    public function finales() {
        return $this->belongsToMany(ExamenFinal::class, 'examenfinales', 'LU', 'codigo_final');
    }


}
