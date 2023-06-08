<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajador extends Model
{
    use HasFactory;

    protected $table = "trabajador";
    protected $primaryKey = "id_trabajador";

    protected $fillable = [
        'id_usuario'
    ];

    public function usuario()
    {

        return $this->belongsTo(usuario::class, 'id_usuario');
    }
}
