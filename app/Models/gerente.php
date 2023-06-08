<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gerente extends Model
{
    use HasFactory;

    protected $table = "gerente";
    protected $primaryKey = "id_gerente";

    protected $fillable = [
        'id_usuario'
    ];

    public function usuario()
    {

        return $this->belongsTo(usuario::class, 'id_usuario');
    }
}
