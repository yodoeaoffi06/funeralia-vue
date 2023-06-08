<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secretaria extends Model
{
    use HasFactory;

    protected $table = "secretaria";
    protected $primaryKey = "id_secretaria";

    protected $fillable = [
        'id_usuario'
    ];

    public function usuario()
    {

        return $this->belongsTo(usuario::class, 'id_usuario');
    }
}
