<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = "materias";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function correlativaaprobadas() {
        return $this->belongsToMany(Materia::class, 'correlativa_aprobadas', 'id_materia','id_correlativa_fuerte');
    }

    public function correlativacursadas() {
        return $this->belongsToMany(Materia::class, 'correlativa_cursadas', 'id_materia','id_correlativa_debil');
    }

    public function profesor(){
        return $this->belongsToMany(Profesor::class, 'dicta', 'id_materia', 'legajo');
    }
}
