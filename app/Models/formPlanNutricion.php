<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formPlanNutricion extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora_PA', 'pequeno_almoco', 'hora_1LM', 'laMati1', 'hora_2LM', 'laMati2', 'hora_A ', 'almoco', 'hora_L1', 'lanche1',
        'hora_L2', 'lanche2', 'hora_L3', 'lanche3', 'hora_JA', 'jantar', 'hora_C', 'ceia', 'socio_id'
    ];
    

    public function socios()
    {
        return $this->hasMany(Socios::class, 'id');
    }
}
