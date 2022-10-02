<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenFinal extends Model
{
    use HasFactory;

    protected $table = "examenfinales";
    protected $primaryKey = "codigo_final";
    public $timestamps = false; 
}
