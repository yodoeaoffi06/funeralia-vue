<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobiliario_total extends Model
{
    use HasFactory;

    protected $table = "mobiliario_total";
    protected $primaryKey = "id_mobiliario_total";

    protected $fillable = [
        'id_mobiliario',
        'cantidad',
        'id_servicio'
    ];

    public function mobiliario()
    {

        return $this->belongsTo(mobiliario::class, 'id_mobiliario');
    }
}
