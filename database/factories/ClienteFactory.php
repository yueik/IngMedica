<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente' => $this->faker->name(),
            'cuit' => $this->faker->randomNumber(),
            'documento' => $this->faker->randomNumber(),
            'telefono' => $this->faker->randomNumber(),
            'mail' => $this->faker->unique()->safeEmail(),
            'activo' => 1,
        ];
    }
}
