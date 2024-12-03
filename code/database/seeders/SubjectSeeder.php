<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'No deberias ver esto',
            'deleted_at' => Carbon::now(),
        ]);
        Subject::create([
            'name' => 'Matematica', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Comunicación', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Unidad de Definicion Institucional I', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Inglés Técnico I', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Psicologia de las Organizaciones', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Modelo de Negocion', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Arquitectura de las Computadoras', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Gestión de Software', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Análisis de Sistemas Organizacionales', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Problemática Socio Contemporanea', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Unidad de Definicion Institucional II', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Estadistica', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Gestíon de Software II', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Estrategias de Negocios', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Desarrollo de Sistemas', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Práctica Profesionalizantes I', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Inglés Técnico II', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Innovación y Desarrollo Emprendedor', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Ética y Responsabilidad Social', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Derecho y Legislación Laboral', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Redes y Comunicaciones', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Seguridad de los Sistemas', //MATERIA SAN PABLO
        ]);

        Subject::create([
            'name' => 'Base de Datos', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Sistemas de Información Organizacional', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Desarrollo de Sistemas WEB', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Práctica Profesionalizante II', //MATERIA SAN PABLO
        ]);
        Subject::create([
            'name' => 'Ciencias Naturales', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Ciencias Sociales', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Inglés', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Educacíon Artística', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Prácticas del Lenguaje', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Educacíon Física', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Construccíon Ciudadana', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Taller', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Biología', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Geografia', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Historia', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Físico Química', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Literatura', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Física', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Química', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Tecnologías Electronicas', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Laboratorio de Hardware', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Laboratorio de Sistemas Operativos', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Matemática Ciclo Superior', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Laboratorio de Aplicaciones', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Sistemas Digitales', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Teleinformática', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Laboratorio de Programacíon', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Política y Ciudadanía', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Análisis Matemático', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Investigacíon Operatica', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Seguridad Informatica', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Derechos del Trabajo', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Filosofia', //MATERIA FRAY
        ]);

        Subject::create([
            'name' => 'Arte', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Matemática Aplicada', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Practicas Profesionalizantes del Sector Informatica', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Evaluacíon de Proyecto', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Modelos y Sistemas', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Proyecto, Diseño e Implementación de Sistemas Computacionales', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Emprendimientos Productivos y Desarrollo Local', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Instalación, Mantenimiento y Reparación de Redes Informáticas', //MATERIA FRAY
        ]);
        Subject::create([
            'name' => 'Instalación, Mantenimiento y Reparación de Sistemas Computacionales', //MATERIA FRAY
        ]);
        
        for ($i = 1; $i <= 10; $i++) {
            DB::table('teacher_subjects')->insert([
                'teacher_id' => Teacher::all()->random()->id,
                'subject_id' => Subject::all()->random()->id,
            ]);
        }
    }
}
