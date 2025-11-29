<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commentaire;
use App\Models\Article;
use App\Models\User;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $articles = Article::all();

        foreach ($articles as $article) {
            Commentaire::factory(rand(2, 5))->create([
                'article_id' => $article->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}
