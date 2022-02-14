<?php

namespace Database\Factories;

use App\Models\Talle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Talle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'talle' => $this->faker->randomNumber,
            'activo' => 1
        ];
    }
}
