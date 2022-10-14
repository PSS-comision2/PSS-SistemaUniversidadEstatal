<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = "materias";
    public $timestamps = false;

    public function correlativaaprobadas() {
        return $this->belongsToMany(Materia::class, 'correlativaaprobadas', 'id', 'id');
    }

    public function correlativacursadas() {
        return $this->belongsToMany(Materia::class, 'correlativacursadas', 'id', 'id');
    }


}
