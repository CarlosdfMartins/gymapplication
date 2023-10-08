<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    protected $table = 'socios';
    protected $fillable = ['nome', 'apelido' , 'telefone', 'password', 'email', 'sexo', 'data_nascimento', 'profile', 'NUT_id', 'PT_id'];


    public function colaborador()
    {
        return $this->hasOne(Colaboradores::class, 'colaborador_id');
    }

    public function nutri()
    {
        return $this->belongsTo(Colaboradores::class, 'NUT_id');
    }

    public function pTrain()
    {
        return $this->belongsTo(Colaboradores::class, 'PT_id');
    }

    public function passwordReset()
    {
        return $this->hasOne(PasswordReset::class, 'socio_id');
    }

    public function NutricaoModel ()
    {
        return $this->belongsTo(NutricaoModel::class, 'id');
    }

    public function formPlanNutricion ()
    {
        return $this->belongsTo(formPlanNutricion::class, 'socio_id');
    }
}



