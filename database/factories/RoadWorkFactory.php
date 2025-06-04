<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoadWork>
 */
class RoadWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('es_AR'); 
        return [
            'name' => $faker->bothify('Ruta ##'),
            'province_id' => $faker->numberBetween(1, 24),
            'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
            'planned_end_date' => $faker->dateTimeBetween('now', '+1 year'),
            'end_date' => null,
        ];
    }
}
