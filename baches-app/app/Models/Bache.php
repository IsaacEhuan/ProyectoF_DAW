<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bache extends Model
{
    protected $table ="baches";
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'latitud',
        'longitud',
        'descripcion',
        'imagen',
        'fecha_creacion'
    ];
    public $timestamps = false;

}
