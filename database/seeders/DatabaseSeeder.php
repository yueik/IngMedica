<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Implante;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Talle;
use App\Models\EstadoInsumo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        EstadoInsumo::factory(3)->create();
        Marca::factory(2)->create();
        Talle::factory(5)->create();
        Modelo::factory(5)->create();
        Implante::factory(10)->create();
    }
}
