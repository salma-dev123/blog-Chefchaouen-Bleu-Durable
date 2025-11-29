<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['nom' => 'admin', 'description' => 'Administrateur du blog']);
        Role::create(['nom' => 'moderateur', 'description' => 'Modérateur du contenu']);
        Role::create(['nom' => 'auteur', 'description' => 'Auteur des articles']);
    }
}
