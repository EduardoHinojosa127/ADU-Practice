<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ask;
use App\Models\AskType;
use App\Models\Professional;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario
        $user = User::create([
            'name' => 'User',
            'lastname' => 'user',
            'role' => 'user',
            'email' => 'user@email.com',
            'password' => Hash::make('12345678'),
        ]);

        Professional::create([
            'country' => 'Perú',
            'region' => 'Arequipa',
            'province' => 'Arequipa',
            'professional_years' => '18',
            'study_program' => 'Admin',
            'institution' => 'Admin',
            'age' => 40,
            'gender' => 'Masculino',
            'user_id' => $user->id,
        ]);

        $admin = User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'role' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
        ]);

        Professional::create([
            'country' => 'Perú',
            'region' => 'Arequipa',
            'province' => 'Arequipa',
            'professional_years' => '18',
            'study_program' => 'Admin',
            'institution' => 'Admin',
            'age' => 40,
            'gender' => 'Masculino',
            'user_id' => $admin->id,
        ]);

        // Datos de las dimensiones y preguntas
        $dimensions = [
            'Aplicación Práctica del Contenido' => [
                'El docente demuestra habilidades prácticas relacionadas con el curso',
                'Explica cómo aplicar los conceptos teóricos en contextos reales',
                'Diseña actividades prácticas relevantes para los objetivos del curso',
                'Proporciona instrucciones claras antes de iniciar las actividades prácticas',
                'Relaciona las actividades prácticas con problemas reales de la profesión',
                'Utiliza ejemplos y casos prácticos actuales para contextualizar el aprendizaje',
                'Fomenta la resolución de problemas prácticos por parte de los estudiantes',
                'Proporciona orientación paso a paso durante las actividades prácticas',
                'Enseña procedimientos y técnicas aplicables al entorno laboral',
                'Evalúa el desempeño práctico de manera continua',
            ],
            'Supervisión y Guía en Actividades Prácticas' => [
                'Supervisa constantemente el progreso de los estudiantes durante las prácticas',
                'Interviene oportunamente para corregir errores en la ejecución práctica',
                'Motiva a los estudiantes a seguir buenas prácticas en las actividades',
                'Proporciona apoyo individualizado según las necesidades de cada estudiante',
                'Se asegura de que los estudiantes comprendan los riesgos o precauciones en el entorno práctico',
                'Promueve el trabajo colaborativo durante las sesiones prácticas',
                'Da retroalimentación inmediata durante las actividades',
                'Fomenta la autonomía de los estudiantes en la resolución de tareas prácticas',
                'Observa y evalúa activamente el desempeño de los estudiantes en tiempo real',
                'Facilita recursos o herramientas necesarias para el aprendizaje práctico',
            ],
            'Evaluación de Competencias Prácticas' => [
                'Diseña evaluaciones prácticas que reflejan las competencias esperadas',
                'Proporciona criterios claros y objetivos para evaluar las actividades prácticas',
                'Retroalimenta de manera específica el desempeño práctico de los estudiantes',
                'Utiliza métodos variados para evaluar competencias prácticas',
                'Evalúa tanto el proceso como el resultado de las actividades prácticas',
                'Promueve la autoevaluación y reflexión sobre las competencias adquiridas',
                'Identifica áreas de mejora en las habilidades prácticas de los estudiantes',
                'Utiliza rúbricas o guías estandarizadas para la evaluación',
                'Reconoce los logros destacados en el desempeño práctico',
                'Ajusta las evaluaciones según las características de los estudiantes',
            ],
            'Relación y Apoyo al Estudiante en Entornos Prácticos' => [
                'Genera un ambiente de confianza en las sesiones prácticas',
                'Motiva a los estudiantes a participar activamente en las prácticas',
                'Es accesible para resolver dudas durante las actividades',
                'Fomenta una comunicación efectiva entre los estudiantes durante el trabajo práctico',
                'Ayuda a los estudiantes a superar desafíos específicos de las actividades',
                'Promueve la creatividad y la innovación en las soluciones prácticas',
                'Facilita un espacio seguro para experimentar y aprender de los errores',
                'Muestra paciencia y empatía ante las dificultades de los estudiantes',
                'Inspira confianza en las habilidades de los estudiantes para el trabajo práctico',
                'Reconoce las necesidades individuales de los estudiantes y adapta su apoyo',
            ],
        ];        

        foreach ($dimensions as $dimensionName => $questions) {
            $questionType = AskType::create([
                'description' => $dimensionName,
            ]);

            foreach ($questions as $questionName) {
                Ask::create([
                    'description' => $questionName,
                    'ask_type_id' => $questionType->id,
                ]);
            }
        }
    }
}
