<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::factory()->create([
            'name'=>'Reparacion de Pc escritorio Nivel I',
            'price'=>50.00
        ]);
        Maintenance::factory()->create([
            'name'=>'Reparacion de Pc escritorio Nivel II',
            'price'=>60.00
        ]);
        Maintenance::factory()->create([
            'name'=>'Reparacion de Pc escritorio Nivel I',
            'price'=>70.00
        ]);
    }
}
