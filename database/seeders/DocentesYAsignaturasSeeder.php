<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Docente;
use App\Models\Asignatura;
use App\Models\Curso; // Importa el modelo Curso

class DocentesYAsignaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //cursos disponibles
        $cursos = Curso::all();

        if ($cursos->isEmpty()) {
            $this->command->warn('No se encontraron cursos. Asegúrate de ejecutar el CursosSeeder primero.');
            return;
        }

        // Lista de docentes y asignaturas
        $docentesData = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@example.com',
                'asignaturas' => ['IA_I', 'IA_II', 'IA_III']
            ],
            [
                'name' => 'María López',
                'email' => 'maria.lopez@example.com',
                'asignaturas' => ['IA_IV', 'IA_V', 'IA_VI']
            ],
            [
                'name' => 'Carlos Ruiz',
                'email' => 'carlos.ruiz@example.com',
                'asignaturas' => ['IA_VII']
            ]
        ];

        foreach ($docentesData as $docenteData) {
            // 1. Crear usuario
            $user = User::create([
                'name' => $docenteData['name'],
                'email' => $docenteData['email'],
                'password' => bcrypt('12345678'), // Contraseña por defecto
            ]);

            // 2. Asignar el rol de docente 
            $user->assignRole('docente');

            // 3. Crear docente
            $docente = Docente::create([
                'id_usuario' => $user->id,
                'contrato' => 'ocasional',
            ]);

            // 4. Crear asignaturas para el docente
            foreach ($docenteData['asignaturas'] as $asignaturaNombre) {
                // Asigna un curso aleatorio
                $curso = $cursos->random();

                Asignatura::create([
                    'id_docente' => $docente->id,
                    'id_curso' => $curso->id, // Usa un curso aleatorio
                    'nombre_asignatura' => $asignaturaNombre,
                    'periodo' => '2024-2S',
                ]);
            }
        }
    }
}
