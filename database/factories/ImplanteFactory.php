<?php

namespace Database\Factories;

use App\Models\Implante;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImplanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Implante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => rand(1,100),
            'serie' => rand(1,100),
            'activo' => 1,
            'talle_id' => rand(1,5),
            'modelo_id' => rand(1,5),
            'estado_id' => rand(1,3)
        ];
    }
}
