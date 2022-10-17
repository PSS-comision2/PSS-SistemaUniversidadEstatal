<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursa extends Model
{
    use HasFactory;

    protected $table = "cursa";
    public $timestamps = false;

    public function alumno() {
        return $this->belongsTo(Alumno::class,  'LU_alumno', 'LU');
    }
}
