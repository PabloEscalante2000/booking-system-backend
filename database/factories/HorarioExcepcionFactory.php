<?php

namespace Database\Factories;

use App\Models\HorarioExcepcion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HorarioExcepcion>
 */
class HorarioExcepcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horaInicio = fake()->numberBetween(7, 15);
        $horaFinal  = $horaInicio + fake()->numberBetween(1, 4);
        $validoDesde = fake()->dateTimeBetween('now', '+1 month');
        $validoHasta = fake()->dateTimeBetween($validoDesde, '+3 months');

        return [
            'terapeuta_id'    => User::factory(),
            'expiration_date' => fake()->dateTimeBetween('+1 month', '+6 months')->format('Y-m-d'),
            'hora_inicio'     => sprintf('%02d:00:00', $horaInicio),
            'hora_final'      => sprintf('%02d:00:00', $horaFinal),
            'razon'           => fake()->sentence(),
            'tipo'            => fake()->randomElement(['dia', 'horas']),
            'valido_desde'    => $validoDesde->format('Y-m-d'),
            'valido_hasta'    => $validoHasta->format('Y-m-d'),
        ];
    }

    public function dia(): static
    {
        return $this->state(fn (array $attributes) => [
            'tipo' => 'dia',
        ]);
    }

    public function horas(): static
    {
        return $this->state(fn (array $attributes) => [
            'tipo' => 'horas',
        ]);
    }
}
