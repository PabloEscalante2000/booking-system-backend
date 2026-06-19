<?php

namespace Database\Factories;

use App\Models\Sesion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sesion>
 */
class SesionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'terapeuta_id'    => User::factory(),
            'paciente_id'    => User::factory(),
        ];
    }
}
