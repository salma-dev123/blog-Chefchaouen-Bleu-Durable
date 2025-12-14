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
    public function definition(): array
    {
        $titre = fake()->unique()->sentence(4);

        return [
           'user_id' => User::inRandomOrder()->value('id') ?? 1,
            'titre' => $titre,
            'slug' => Str::slug($titre),
            'extrait' => fake()->sentence(12),
            'contenu' => '<p>' . implode('</p><p>', fake()->paragraphs(5)) . '</p>',
            'image' => 'images/articles/' . fake()->numberBetween(1,10) . '.jpg',
            'vues' => fake()->numberBetween(0, 500),
            'likes' => fake()->numberBetween(0, 200),
            'status' => fake()->randomElement(['brouillon', 'en edition', 'a_valider', 'publie']),
        ];
    }
}
