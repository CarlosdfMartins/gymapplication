<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutricaoModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'peso_kg', 'altura_cm', 'IMC','m_Gorda_kg', 'm_Gorda_Percen', 'm_Magra_kg', 'm_Magra_Percen',
        'ffm','TBW', 'Vis_Fat_R', 'Peito', 'Abdomen', 'Anca'
    ];


    public function socios()
    {
        return $this->hasMany(Socios::class, 'id');
    }

}
