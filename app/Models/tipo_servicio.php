<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_servicio extends Model
{
    use HasFactory;

    protected $table = "tipo_servicio";
    protected $primaryKey = "id_tipo_servicio";

    protected $fillable = [
        'tipo'
    ];
}
