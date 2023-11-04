<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model
{


    protected $table = 'colaboradores';
    protected $fillable = ['nome', 'apelido', 'telefone', 'password', 'email', 'sexo', 'data_nascimento', 'profile'];

    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'colaborador_id');
    }
    //========================================================================================================================
    public function socio()
    {
        return $this->hasOne(Socios::class, 'socio_id');
    }
    //========================================================================================================================
    public function sociosNUT()
    {
        return $this->hasMany(Socios::class, 'NUT_id');
    }
    //========================================================================================================================
    public function sociosPT()
    {
        return $this->hasMany(Socios::class, 'PT_id');
    }
}
