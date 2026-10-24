<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    public function meals()
    {
        return $this->hasMany(Meal::class, 'meal_plan_id');
    }

    protected $fillable = ['user_id', 'name', 'goal_calories'];
}
