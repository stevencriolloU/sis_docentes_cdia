<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al seeder para crear los roles 
        $this->call(RoleSeeder::class);

        // Llamar al seeder para el usuario admin
        $this->call(AdminUserSeeder::class);

        // Llamar al seeder para cursos
        $this->call(CursosSeeder::class);

        // Llamar al seeder para asignaturas
        $this->call(DocentesYAsignaturasSeeder::class);

        // Llamar al seeder para preguntas y opciones
        $this->call(PreguntasSeeder::class);
    }
}
