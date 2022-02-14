<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\Implante;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Talle;
use App\Models\EstadoInsumo;
use App\Models\EstadoEgreso;
use App\Models\IngresoStock;
use App\Models\EgresoStock;
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
        //User::factory(10)->create();

        Cliente::factory(20)->create();
        
        


        //Estados del Insumo
        EstadoInsumo::create([
            'estado' => 'En Stock',
            'activo' => 1
        ]);
        EstadoInsumo::create([
            'estado' => 'Dañado',
            'activo' => 1
        ]);
        EstadoInsumo::create([
            'estado' => 'Concesión',
            'activo' => 1
        ]);
        EstadoInsumo::create([
            'estado' => 'Facturado',
            'activo' => 1
        ]);
        //Estados Egreso
        EstadoEgreso::create([
            'estado' => 'Preparado',
            'activo' => 1
        ]);
        EstadoEgreso::create([
            'estado' => 'Recibido',
            'activo' => 1
        ]);
        EstadoEgreso::create([
            'estado' => 'Facturado',
            'activo' => 1
        ]);

        //Marcas
        Marca::create([
            'marca' => 'Mentor',
            'activo' => 1
        ]);
        Marca::create([
            'marca' => 'Gamma',
            'activo' => 1
        ]);

        //Talles
        Talle::create([
            'talle' => '200cc',
            'activo' => 1
        ]);
        Talle::create([
            'talle' => '300cc',
            'activo' => 1
        ]);
        Talle::create([
            'talle' => '350cc',
            'activo' => 1
        ]);
        Talle::create([
            'talle' => '450cc',
            'activo' => 1
        ]);
        Talle::create([
            'talle' => '500cc',
            'activo' => 1
        ]);

        //Modelos
        Modelo::create([
            'modelo' => 'Lisa',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 1
        ]);
        Modelo::create([
            'modelo' => 'Moderada',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 1
        ]);
        Modelo::create([
            'modelo' => 'Texturizada',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 1
        ]);
        Modelo::create([
            'modelo' => 'Anatómica',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 1
        ]);
        Modelo::create([
            'modelo' => 'Lisa',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 2
        ]);
        Modelo::create([
            'modelo' => 'Anatómica',
            'precio' => 700,
            'activo' => 1,
            'marca_id' => 2
        ]);

        Implante::factory(10)->create();

        IngresoStock::create([
            'fecha' => '2022-01-01',
            'observacion' => '',
            'activo' => 0
        ]);
        //Modificar en BD, id = 0
        EgresoStock::create([
            'fecha' => '2022-01-01',
            'observacion' => '',
            'cliente_id' => 1,
            'montoFinal' => 0,
            'estado_id' => 1,
            'activo' => 0
        ]);
    }
}
