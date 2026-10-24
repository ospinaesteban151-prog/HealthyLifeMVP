<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExercisePlan extends Model
{
    public function exercises() {
        return $this->hasMany(Exercise::class, 'exercise_plan_id');
    }
}
