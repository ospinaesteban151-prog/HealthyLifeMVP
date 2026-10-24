<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'typical_food'];

    public function foods()
    {
        return $this->hasMany(Food::class, 'country_id');
    }
}
