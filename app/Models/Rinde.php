<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rinde extends Model
{
    use HasFactory;

    protected $table = "rinde";
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(Alumno::class,  'LU_alumno', 'LU');
    }

    public function final() {
        return $this->belongsTo(ExamenFinal::class, 'id_final', 'id');
    }
}
