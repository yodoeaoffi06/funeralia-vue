<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignacion extends Model
{
    use HasFactory;

    protected $table = "asignacion";
    protected $primaryKey = "id_asignacion";

    protected $fillable = [
        'id_servicio',
        'id_trabajador',
    ];

    public function servicio()
    {

        return $this->belongsTo(servicio::class, 'id_servicio');
    }

    public function trabajador()
    {

        return $this->belongsTo(trabajador::class, 'id_trabajador');
    }
}
