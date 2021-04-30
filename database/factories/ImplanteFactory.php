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
            'codigo' => $this->faker->rand(1,100),
            'activo' => 1,

            'marca_id' => rand(1,2),
            'talle_id' => rand(1,5),
            'estado_id' => rand(1,3)
        ];
    }
}
