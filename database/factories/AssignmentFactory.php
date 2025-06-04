<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
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
            'machine_id' => $faker->unique()->numberBetween(1, 10),
            'roadwork_id' => $faker->numberBetween(1, 10),
            'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
            'end_date' => null,
            'kilometers_traveled' => $faker->numberBetween(0, 10000000),
            'end_reason_id' => null,   

        ];
    }
}
