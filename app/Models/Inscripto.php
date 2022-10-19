<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Inscripto extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "inscripto";
    protected $primaryKey = ['id_carrera', 'id_materia'];
    public $incrementing = false;

}
