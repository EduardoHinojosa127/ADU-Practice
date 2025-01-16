<?php

namespace App\Exports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EvaluationsMassiveExport implements FromView
{

    /**
     * Retorna una vista para la exportación.
     *
     * @return View
     */
    public function view(): View
    {
        $evaluations = Exam::with('professional.user')->get();

        return view('exports.evaluationMassive', [
            'evaluations' => $evaluations
        ]);
    }
}
