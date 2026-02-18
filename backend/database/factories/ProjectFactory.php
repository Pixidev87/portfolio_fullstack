<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            "title" => $title,
            "slug" => fake()->Str::slug($title),
            "description" => fake()->paragraph(),
            "content" => fake()->paragraphs(3, true),
            "image_url" => fake()->imageUrl(640, 480, 'business'),
            "github_url" => fake()->url(),
            "featured" => fake()->boolean(20) # 20% eséllyel lesz true
        ];
    }
}
