<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marque' => $this->faker->company(),
            'model' => $this->faker->year(),
            'type' => $this->faker->randomElement(["diesel", "essence"]),
            'prixJ' => $this->faker->numberBetween(100, 500),
            'image' => 'photoCar/hero-image.fill.size_1248x702.v1699833220.jpg',
            'dispo' => $this->faker->numberBetween(0, 1),
            'vitesse' => $this->faker->randomElement(['automatique', 'manuelle']),
        ];
    }
}

