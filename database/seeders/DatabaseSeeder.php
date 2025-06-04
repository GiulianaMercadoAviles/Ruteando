<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TypesMaintenanceSeeder::class);
        $this->call(TypesMachineSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(EndReasonsSeeder::class);
        $this->call(MachineSeeder::class);
        $this->call(MaintenanceSeeder::class);
        $this->call(RoadWorkSeeder::class);

        // Create a default user
        User::create([
            'name' => 'Giuliana Mercado Aviles',
            'email' => 'giulianamercado43@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
