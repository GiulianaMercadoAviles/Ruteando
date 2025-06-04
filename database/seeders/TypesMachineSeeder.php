<?php

namespace Database\Seeders;

use App\Models\TypesMachine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypesMachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Excavadora', 'image' => 'img\excavadora.jpg'],
            ['name' => 'Aplanadora', 'image' => 'img\aplanadora.jpg'],
            ['name' => 'Grúa', 'image' => 'img\grua.jpg'],
            ['name' => 'Mezcladora', 'image' => 'img\mezcladora.jpg'],
            ['name' => 'Camión de carga', 'image' => 'img\camiondecarga.jpg'],
            ['name' => 'Bulldozer', 'image' => 'img\bulldozer.jpg'],
            ['name' => 'Cargadora', 'image' => 'img\cargadora.jpg'],
        ];

        foreach ($types as $type) {
            TypesMachine::create($type);
        }
    }
}
