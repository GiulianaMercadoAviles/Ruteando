<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $provinces = [
            ['id' => 1, 'name' => 'Salta'],
            ['id' => 2, 'name' => 'Buenos Aires'],
            ['id' => 3,'name' => 'CABA'],
            ['id' => 4, 'name' => 'Córdoba'],
            ['id' => 5, 'name' => 'Santa Fe'],
            ['id' => 6, 'name' => 'Mendoza'],
            ['id' => 7, 'name' => 'Tierra del Fuego'],
            ['id' => 8, 'name' => 'Neuquén'],
            ['id' => 9, 'name' => 'Jujuy'],
            ['id' => 10, 'name' => 'Tucumán'],
            ['id' => 11, 'name' => 'Santiago del Estero'],
            ['id' => 12, 'name' => 'Catamarca'],
            ['id' => 13, 'name' => 'La Rioja'],
            ['id' => 14, 'name' => 'San Juan'],
            ['id' => 15, 'name' => 'San Luis'],
            ['id' => 16, 'name' => 'Chaco'],
            ['id' => 17, 'name' => 'Formosa'],
            ['id' => 18, 'name' => 'Corrientes'],
            ['id' => 19, 'name' => 'Misiones'],
            ['id' => 20, 'name' => 'Entre Ríos'],
            ['id' => 21, 'name' => 'La Pampa'],
            ['id' => 22, 'name' => 'Santa Cruz'],
            ['id' => 23, 'name' => 'Chubut'],
            ['id' => 24, 'name' => 'Rio Negro']
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
