<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el rol de admin si no existe
        $role = Role::firstOrCreate(['name' => 'admin']);
        
        // Crear el usuario admin (si no existe)
        $user = User::firstOrCreate([
            'email' => 'admin@admin',  // Asegúrate de usar un correo único
        ], [
            'name' => 'Admin',
            'password' => bcrypt('12345678'),  // Asegúrate de usar una contraseña segura
        ]);

        // Asignar el rol de admin al usuario
        $user->assignRole('admin');
    }
}
