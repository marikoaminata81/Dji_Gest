<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifier si le rôle 'Super Admin' existe, sinon le créer
        $role = Role::firstOrCreate(
            ['nom' => 'Super Admin'], // Si ce rôle existe, il est récupéré, sinon il est créé
            ['nom' => 'Super Admin']  // Valeurs par défaut
        );

        // Créer un utilisateur Super Admin si nécessaire
        User::firstOrCreate(
            ['email' => 'superadmin@example.com'], // Empêche la duplication
            [
                'prenom' => 'Admin',
                'nom' => 'Super',
                'username' => 'superadmin',
                'telephone' => '+223 79 00 00 00',
                'adresse' => 'Bamako',
                'date_de_naissance' => '2000-01-01',
                'sexe' => 'Homme',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('SuperAdmin123!'), // Change le mot de passe pour la production
                'role_id' => $role->id, // Assigner l'id du rôle trouvé ou créé
            ]
        );
    }
}