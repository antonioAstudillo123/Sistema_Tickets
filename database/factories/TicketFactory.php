<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Tickets\TicketModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TicketFactory extends Factory
{

    protected $model = TicketModel::class;



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->catchPhrase(),
            'description' => fake()->text(),
            'user_id' => User::inRandomOrder()->first(),
            'assigned_to' => 1
        ];
    }
}
