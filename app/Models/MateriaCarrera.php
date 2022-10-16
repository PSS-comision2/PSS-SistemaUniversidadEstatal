<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaCarrera extends Model
{
    use HasFactory;

    protected $table = "tiene";
    public $timestamps = false;

    protected $primaryKey = ['id_carrera', 'id_materia'];
    public $incrementing = false;
    
    public function materia() {
        return $this->belongsTo(Materia::class, 'id_materia', 'id');
    }
}
