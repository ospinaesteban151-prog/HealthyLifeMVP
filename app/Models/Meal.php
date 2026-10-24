<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['meal_plan_id', 'food_id', 'portion_size'];

}