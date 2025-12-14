<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    public function definition(): array
    {
        $nom = fake()->unique()->words(2, true);

        return [
            'nom' => ucfirst($nom),
            'slug' => Str::slug($nom),
        ];
    }
}
