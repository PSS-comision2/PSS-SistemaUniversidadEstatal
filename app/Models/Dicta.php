<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicta extends Model
{
    use HasFactory;

    protected $table = "dicta";
    protected $primaryKey = ['legajo', 'id_materia'];
    public $incrementing = false;
    public $timestamps = false;

    public function materia() {
        return $this->belongsTo(Materia::class,  'id_materia', 'id');
    }
    public function profesor() {
        return $this->belongsTo(Profesor::class, 'legajo', 'legajo');
    }
}
