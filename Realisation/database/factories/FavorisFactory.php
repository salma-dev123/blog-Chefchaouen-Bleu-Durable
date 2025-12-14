<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favoris>
 */
class FavorisFactory extends Factory
{
    public function definition(): array
    {
        return [
             'user_id' => User::inRandomOrder()->value('id') ?? 1,
             'article_id' => Article::inRandomOrder()->value('id') ?? 1,
        ];
    }
}
