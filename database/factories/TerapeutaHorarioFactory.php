<?php

namespace Database\Factories;

use App\Models\TerapeutaHorario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TerapeutaHorario>
 */
class TerapeutaHorarioFactory extends Factory
{
    public function definition(): array
    {
        $horaInicio = fake()->numberBetween(7, 15);
        $horaFinal  = $horaInicio + fake()->numberBetween(1, 4);
        $validoDesde = fake()->dateTimeBetween('now', '+1 month');
        $validoHasta = fake()->dateTimeBetween($validoDesde, '+6 months');

        return [
            'terapeuta_id'  => User::factory(),
            'dia'           => fake()->numberBetween(0, 6),
            'hora_inicio'   => sprintf('%02d:00:00', $horaInicio),
            'hora_final'    => sprintf('%02d:00:00', $horaFinal),
            'slot_duration' => fake()->randomElement([30, 45, 60]),
            'is_active'     => true,
            'valido_desde'  => $validoDesde->format('Y-m-d'),
            'valido_hasta'  => $validoHasta->format('Y-m-d'),
        ];
    }
}
