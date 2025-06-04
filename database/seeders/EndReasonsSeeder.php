<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EndReason;


class EndReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reasons = [
            ['motive' => 'Finalización de trabajo'],
            ['motive' => 'Mantenimiento'],
            ['motive' => 'Falla
mecánica'],
            ['motive' => 'Reasignación'],
            ['motive' => 'Otros']
        ];

        foreach ($reasons as $reason) {
            EndReason::create($reason);
        }
    }
}
