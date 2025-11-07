<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\User;
 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentaire>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenu' => fake()->sentence(10),
            'article_id' => Article::inRandomOrder()->value('id') ?? 1,
            'user_id' => User::inRandomOrder()->value('id') ?? 1,
        ];
    }
}
