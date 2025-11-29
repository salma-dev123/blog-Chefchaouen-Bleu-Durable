<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Categorie;

class PivoteArticleCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorieIds = Categorie::pluck('id');

        Article::all()->each(function ($article) use ($categorieIds) {
            $article->categories()->sync(
                $categorieIds->random(rand(1, 3))->all()
            );
        });
    }
}
