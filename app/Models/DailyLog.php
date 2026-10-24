<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{
    protected $fillable = ['user_id', 'date', 'total_calories_eaten', 'total_calories_burned'];

    public function user() 
    {
    return $this->belongsTo(User::class);
    }
}
