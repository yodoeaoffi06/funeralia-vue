<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class usuario extends Model implements Authenticatable, JWTSubject
{
    use HasFactory, HasApiTokens;

    protected $table = "usuario";
    protected $primaryKey = "id_usuario";

    protected $fillable = [
        'nombre',
        'ap_pat',
        'ap_mat',
        'telefono',
        'id_tipo',
        'password',
        'email',
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function tipo_usuario()
    {

        return $this->belongsTo(tipo_usuario::class, 'id_tipo');
    }

    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }

    public function getAuthIdentifier()
    {
        return $this->id_usuario;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
