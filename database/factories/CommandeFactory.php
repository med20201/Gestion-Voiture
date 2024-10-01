<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::pluck('id')->random(),
            'car_id' => \App\Models\Car::pluck('id')->random(),
            'dateL' => fake()->date('Y-m-d'),
            'dateR'=>fake()->date('Y-m-d'),
            'jours'=>fake()->numberBetween(3,10),
            'prixTTC' => fake()->numberBetween(300,1500),
            'note'=>fake()->realText(50)
        ];
    }
}
