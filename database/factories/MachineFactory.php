<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
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
            'serial_number' => strtoupper($faker->unique()->bothify('???-####')),
            'type_machine_id' => $faker->numberBetween(1, 7),
            'model' => $faker->word(),
            'brand' => $faker->word(),
            'status_id' => config('constants.unassigned_status_id'),
            'current_kilometers' => $faker->numberBetween(0, 10000),
            'life_kilometers' => $faker->numberBetween('current_kilometers', 1000000),
            'maintenance_kilometers_limit' => $faker->numberBetween(0, 100000)
        ];
    }
}
