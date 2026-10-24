<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    protected $fillable = ['name','calories','country_id',];
}
