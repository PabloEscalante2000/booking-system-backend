<?php

namespace Database\Factories;

use App\Models\SlotsViable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SlotsViable>
 */
class SlotsViableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fechaInicio = Carbon::instance(
            fake()->dateTimeBetween('-1 week','+1 week')
        );

        return [
            'terapeuta_id'    => User::factory(),
            'estatus'         => fake()->randomElement(["d","r","b"]),
            'source'          => fake()->randomElement(["d","r","b"]),
            'fecha_inicio'    => $fechaInicio,
            'fecha_final'     => $fechaInicio->copy()->addHours(1)
        ];
    }
}
