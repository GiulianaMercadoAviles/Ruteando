<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypesMaintenance;

class TypesMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            
    ['name' => 'Inspecciones de Equipos', 'description' => 'Evaluación visual y técnica para detectar desgastes, fallos o necesidades de mantenimiento preventivo.'],
    ['name' => 'Limpieza', 'description' => 'Eliminación de suciedad, polvo y residuos para mejorar el funcionamiento y la durabilidad de los equipos.'],
    ['name' => 'Lubricación', 'description' => 'Aplicación de aceites o grasas para reducir el desgaste, fricción y prevenir averías.'],
    ['name' => 'Relleno de Combustible', 'description' => 'Reabastecimiento de combustible necesario para el correcto funcionamiento de la maquinaria.'],
    ['name' => 'Revisión de Sistemas Hidráulicos', 'description' => 'Verificación de bombas, válvulas y mangueras para detectar fugas y asegurar la eficiencia del sistema.'],
    ['name' => 'Revisión de Sistemas Eléctricos', 'description' => 'Inspección de cables, conexiones y componentes eléctricos para evitar fallos operativos.'],
    ['name' => 'Ajustes y Reparaciones Menores', 'description' => 'Corrección de pequeños problemas mecánicos para mantener el rendimiento óptimo de los equipos.'],
    ['name' => 'Reemplazo de Piezas', 'description' => 'Sustitución de componentes desgastados o dañados para garantizar el funcionamiento seguro.'],
    ['name' => 'Calibración de Equipos', 'description' => 'Ajuste preciso de sensores y mecanismos para garantizar mediciones correctas y rendimiento óptimo.'],
    ['name' => 'Diagnóstico y Monitoreo Digital de Equipos', 'description' => 'Uso de herramientas digitales para analizar el estado, rendimiento y posibles fallas de las máquinas.'],
    ['name' => 'Pruebas de Carga y Rendimiento', 'description' => 'Evaluaciones bajo condiciones de trabajo para medir la capacidad y eficiencia operativa del equipo.']

        ];

        foreach ($types as $type) {
            TypesMaintenance::create($type);
        }
    }
}
