<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['id' => 1, 'situation' => 'Asignado'],
            ['id' => 2, 'situation' => 'No asignado'],
            ['id' => 3, 'situation' => 'Fuera de servicio'],
            ['id' => 4, 'situation' => 'En mantenimiento']

        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
