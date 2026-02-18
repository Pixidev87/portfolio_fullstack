<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        // Egyedi technológia név (pl. React, Laravel, Docker)
        'name' => fake()->unique()->word(),
        // Egy ikon neve (később a React-ben jól jön pl. FontAwesome-hoz)
        'icon' => 'fa-brands fa-react',
        'category' => fake()->randomElement(['frontend', 'backend', 'devops']),
    ];
    }
}
