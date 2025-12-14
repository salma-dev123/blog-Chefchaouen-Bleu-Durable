<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Favoris;

class FavorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();

        User::all()->each(function ($user) use ($articles) {
            // chaque utilisateur aura 1 à 3 favoris
            $randomArticles = $articles->random(rand(1, 3));

            foreach ($randomArticles as $article) {
                Favoris::create([
                    'user_id' => $user->id,
                    'article_id' => $article->id,
                ]);
            }
        });
    }
}
