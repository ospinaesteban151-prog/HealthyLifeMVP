<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'progress';
    protected $fillable = ['user_id', 'weight', 'body_fat_percentage', 'date'];
}
