<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titre = fake()->unique()->sentence(4);

        return [
            'user_id' => User::inRandomOrder()->value('id') ?? 1,
            'title' => $titre,
            'slug' => Str::slug($titre),
            'excerpt' => fake()->sentence(12),
            'contenu' => fake()->paragraphs(4, true),
            'image' => fake()->imageUrl(800, 600, 'nature', true),
            'status' => fake()->randomElement(['en_attente', 'valide']),
        ];
    }
}
