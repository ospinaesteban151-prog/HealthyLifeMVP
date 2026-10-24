<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['exercise_plan_id', 'name', 'duration_minutes', 'calories_burned'];
    public function exercisePlan() 
    {
    return $this->belongsTo(ExercisePlan::class);
    }
}
