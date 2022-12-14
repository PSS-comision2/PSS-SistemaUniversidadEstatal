<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicta extends Model
{
    use HasFactory;

    protected $table = "dicta";
    public $timestamps = false;

    public function materia() {
        return $this->belongsTo(Materia::class,  'id_materia', 'id');
    }

}
