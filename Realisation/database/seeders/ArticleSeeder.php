<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();

        Article::create([
            'titre' => 'Comment visiter Chefchaouen de façon écologique',
            'slug' => 'visiter-chefchaouen-ecologique',
            'extrait' => 'Conseils pour un tourisme responsable à Chefchaouen.',
            'contenu' => '<p>Chefchaouen est une ville fragile et magnifique...</p><p>Respecter son environnement est essentiel.</p>',
            'image' => 'images/articles/1.jpg',
            'vues' => 120,
            'likes' => 40,
            'status' => 'publie',
            'user_id' => $admin->id,
        ]);

        Article::create([
            'titre' => 'Les plus belles randonnées écologiques autour de Chefchaouen',
            'slug' => 'randonnees-ecologiques-chefchaouen',
            'extrait' => 'Découvrez les sentiers naturels de Chefchaouen.',
            'contenu' => '<p>Les montagnes du Rif offrent des paysages incroyables...</p>',
            'image' => 'images/articles/2.jpg',
            'vues' => 90,
            'likes' => 28,
            'status' => 'publie',
            'user_id' => $admin->id,
        ]);

        Article::factory(8)->create();
    }
}
