<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = ['name', 'email', 'password', 'age', 'weight', 'height'];

    public function progresses() 
    {
    return $this->hasMany(Progress::class);
    }
    public function mealPlans() 
    {
    return $this->hasMany(MealPlan::class);
    }

}