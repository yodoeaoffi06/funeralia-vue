<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    use HasFactory;

    protected $table = "servicio";
    protected $primaryKey = "id_servicio";

    protected $fillable = [
        'id_cliente',
        'id_tipo_servicio',
        'fecha_entrega',
        'fecha_recogida'
    ];

    public function cliente()
    {

        return $this->belongsTo(cliente::class, 'id_cliente');
    }

    public function tipo_servicio()
    {

        return $this->belongsTo(tipo_servicio::class, 'id_tipo_servicio');
    }
}
