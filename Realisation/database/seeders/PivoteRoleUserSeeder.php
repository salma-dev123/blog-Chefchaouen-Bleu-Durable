<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class PivoteRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('nom', 'admin')->first();
        $moderateur = Role::where('nom', 'moderateur')->first();
        $auteur = Role::where('nom', 'auteur')->first();

        $users = User::all();

        foreach ($users as $index => $user) {
            if ($index === 0) {
                $user->roles()->sync([$admin->id]);
            } elseif ($index === 1 || $index === 2) {
                $user->roles()->sync([$moderateur->id]);
            } else {
                $user->roles()->sync([$auteur->id]);
            }
        }
    }
}
