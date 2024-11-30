<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use Faker\Generator as Faker;

class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = app(Faker::class); 
        
        return [ 
            'profile_id' => 2,
            'item_id' => $faker->unique()->randomElement(Item::pluck('id')->toArray()),
            'created_at' => now(),
            'updated_at' => now(), 
        ];
    }
}
