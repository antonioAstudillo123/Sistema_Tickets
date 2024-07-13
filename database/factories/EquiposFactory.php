<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Inventarios\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EquiposFactory extends Factory
{


    protected $model = Equipo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial_number' => fake()->postcode(),
            'marca' => fake()->freeEmailDomain(),
            'modelo' => fake()->domainWord(),
            'procesador' => fake()->domainName(),
            'ram' =>  fake()->numberBetween(8,32),
            'almacenamiento' => fake()->numberBetween(250 , 1024),
            'sistema_operativo' => fake()->randomElement(['Windows 10 home' , 'Windows 11' , 'Windows 7' ,'Windows 10 pro']),
            'fecha_compra' => fake()->date(),
            'fecha_garantia' => fake()->date(),
            'assigned_user' => User::inRandomOrder()->first(),
            'mac' => fake()->macAddress(),
            'ip' => fake()->ipv4(),
            'estatus' => 'Activa',
        ];
    }
}
