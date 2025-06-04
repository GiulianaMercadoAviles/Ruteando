<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
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
            'machine_id' => $faker->numberBetween(1, 10),
            'maintenance_date' => $faker->dateTimeBetween('-1 year', 'now'),
            'maintenance_kilometers' => $faker->numberBetween(0, 100000),
            'type_maintenance_id' => $faker->numberBetween(1, 5),
            'is_active' => 1,
        ];
    }
}
