<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventarios\Equipo;
use App\Models\Tickets\TicketModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(3)->create();
         //TicketModel::factory(10)->create();
        // Equipo::factory(5)->create();

    }
}
