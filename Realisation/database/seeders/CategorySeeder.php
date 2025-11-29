<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Tourisme Durable',
            'Environnement',
            'Randonnée',
            'Culture Locale',
            'Écotourisme',
            'Artisanat'
        ];

        foreach ($categories as $cat) {
            Categorie::create([
                'nom' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }
    }
}
