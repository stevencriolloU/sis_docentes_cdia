<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Docente;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        // Crear el usuario admin (si no existe)
        $user = User::firstOrCreate([
            'email' => 'admin@admin',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar el rol de admin al usuario
        $user->assignRole('admin');

        // Crear el usuario docente (si no existe)
        $docente = User::firstOrCreate([
            'email' => 'docente@docente',
        ], [
            'name' => 'Docente',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar el rol de docente al usuario
        $docente->assignRole('docente');
        
        //Docente::create(['id_usuario' => $docente->id]);

        // Crear el usuario estudiante (si no existe)
        $estudiante = User::firstOrCreate([
            'email' => 'estudiante@estudiante',
        ], [
            'name' => 'Estudiante',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar el rol de estudiante al usuario
        $estudiante->assignRole('estudiante');
    }
}
