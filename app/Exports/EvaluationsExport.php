<?php

namespace App\Exports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EvaluationsExport implements FromView
{
    protected $evaluation_id;

    public function __construct($evaluation_id)
    {
        $this->evaluation_id = $evaluation_id;
    }

    /**
     * Retorna una vista para la exportación.
     *
     * @return View
     */
    public function view(): View
    {
        $evaluation = Exam::with('professional.user')->findOrFail($this->evaluation_id);

        return view('exports.evaluation', [
            'evaluation' => $evaluation
        ]);
    }
}
