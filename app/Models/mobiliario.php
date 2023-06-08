<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobiliario extends Model
{
    use HasFactory;

    protected $table = "mobiliario";
    protected $primaryKey = "id_mobiliario";

    protected $fillable = [
        'nombre',
        'id_tipo_servicio'
    ];

    public function tipo_servicio()
    {

        return $this->belongsTo(tipo_servicio::class, 'id_tipo_servicio');
    }
}
