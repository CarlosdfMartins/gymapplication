<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{

    protected $fillable = ['email', 'token', 'expires_at'];


    public function socio()
    {
        return $this->belongsTo(Socios::class, 'socio_id');
    }
    //========================================================================================================================
    public function colaborador()
    {
        return $this->belongsTo(Colaboradores::class, 'colaborador_id');
    }
}
