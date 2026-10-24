<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
{
    // Crear Colombia
    $colombia = \App\Models\Country::create([
        'name' => 'Colombia',
        'typical_food' => 'Bandeja Paisa'
    ]);

    // Añadir alimentos locales
    \App\Models\Food::create([
        'name' => 'Arepa de Maíz',
        'calories' => 250,
        'country_id' => $colombia->id
    ]);

    \App\Models\Food::create([
        'name' => 'Sancocho',
        'calories' => 500,
        'country_id' => $colombia->id
    ]);
}
}
