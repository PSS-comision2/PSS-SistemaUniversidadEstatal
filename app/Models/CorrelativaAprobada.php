<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrelativaAprobada extends Model
{
    use HasFactory;

    protected $table = "correlativa_aprobadas";
    public $timestamps = false;
}
