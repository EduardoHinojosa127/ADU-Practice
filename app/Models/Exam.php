<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'professional_id',
    ];

    protected $appends = [
        'interpretation',
        'total'
    ];

    //relations
    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function exam_answers()
    {
        return $this->hasMany(ExamAnswer::class);
    }

    public function getInterpretationAttribute()
    {
        $interpretationRules = [
            ['percentil' => '95-100', 'range' => [60, 70], 'label' => 'Excelente'],
            ['percentil' => '80-94', 'range' => [48, 60], 'label' => 'Muy bueno'],
            ['percentil' => '60-79', 'range' => [36, 48], 'label' => 'Bueno'],
            ['percentil' => '40-59', 'range' => [24, 36], 'label' => 'Regular'],
            ['percentil' => '20-39', 'range' => [12, 24], 'label' => 'Deficiente'],
            ['percentil' => '0-19', 'range' => [0, 12], 'label' => 'Muy deficiente'],
        ];

        return $this->exam_answers
            ->groupBy(fn($answer) => $answer->ask->ask_type_id)
            ->map(function ($group) use ($interpretationRules) {
                $sum = $group->sum(fn($answer) => (int) $answer->answer);

                $interpretation = collect($interpretationRules)->first(function ($rule) use ($sum) {
                    return $sum >= $rule['range'][0] && $sum <= $rule['range'][1];
                });

                return [
                    'sum' => $sum,
                    'percentil' => $interpretation['percentil'] ?? 'N/A',
                    'interpretation' => $interpretation['label'] ?? 'Sin interpretación',
                ];
            });
    }


    public function getTotalAttribute()
    {
        // Definir las reglas de interpretación
        $interpretationRules = [
            ['percentil' => '95-100', 'range' => [240, 280], 'label' => 'Excelente'],
            ['percentil' => '80-94', 'range' => [196, 239], 'label' => 'Muy bueno'],
            ['percentil' => '60-79', 'range' => [168, 195], 'label' => 'Bueno'],
            ['percentil' => '40-59', 'range' => [140, 167], 'label' => 'Regular'],
            ['percentil' => '20-39', 'range' => [112, 139], 'label' => 'Deficiente'],
            ['percentil' => '0-19', 'range' => [40, 111], 'label' => 'Muy deficiente'],
        ];

        // Calcular la suma total
        $totalSum = $this->exam_answers->sum(fn($answer) => (int) $answer->answer);

        // Buscar la regla de interpretación correspondiente
        $interpretation = collect($interpretationRules)->first(function ($rule) use ($totalSum) {
            return $totalSum >= $rule['range'][0] && $totalSum <= $rule['range'][1];
        });

        // Devolver el objeto con los datos
        return [
            'sum' => $totalSum,
            'percentil' => $interpretation['percentil'] ?? 'N/A',
            'interpretation' => $interpretation['label'] ?? 'Sin interpretación',
        ];
    }

}
