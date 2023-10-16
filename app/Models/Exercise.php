<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['train_plan_id', 'socio_id', 'exercicio', 'series','reps','CAD','intense','pausa','OBS'];

    public function trainPlan()
    {
        return $this->belongsTo(TrainPlan::class);
    }
}
