<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = "materias";
    protected $primaryKey = "codigo";
    public $timestamps = false; 

    public function correlativaaprobadas() {
        return $this->belongsToMany(Materia::class, 'correlativaaprobadas', 'codigo', 'codigo');
    }

    public function correlativacursadas() {
        return $this->belongsToMany(Materia::class, 'correlativacursadas', 'codigo', 'codigo');
    }

    
}
