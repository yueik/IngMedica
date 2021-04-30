<?php

namespace Database\Factories;

use App\Models\EstadoInsumo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstadoInsumoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EstadoInsumo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estado' => $this->faker->name,
            'activo' => 1
        ];
    }
}
