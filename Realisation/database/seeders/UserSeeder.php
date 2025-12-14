<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'El Razi Ahmed',
            'email' => 'admin@bleu.ma',
            'role' => 'admin',
        ]);

        User::factory(2)->create([
            'role' => 'moderateur',
        ]);

        User::factory(5)->create([
            'role' => 'auteur',
        ]);
    }
}
