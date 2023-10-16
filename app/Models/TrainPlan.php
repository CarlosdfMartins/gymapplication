<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainPlan extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }
}
