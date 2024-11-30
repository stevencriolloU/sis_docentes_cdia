<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestres = ['1ero', '2do', '3ro', '4to', '5to', '6to', '7mo', '8vo'];
        
        foreach ($semestres as $semestre) {
            Curso::create(['semestre' => $semestre, 'paralelo' => 'A']);
        }         
    }
}
