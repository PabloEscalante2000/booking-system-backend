<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // * Creando 25 clientes
        User::factory(25)->create();

        // * Creando 3 terapeutas
        User::factory(3)->terapeuta()->create();

        // * Creando 1 admin
        User::factory(1)->admin()->create();
    }
}
