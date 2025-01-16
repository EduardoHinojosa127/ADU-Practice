<?php

namespace App\Http\Controllers\Evaluations;

use App\Exports\EvaluationsExport;
use App\Exports\EvaluationsMassiveExport;
use App\Http\Controllers\Controller;
use App\Models\AskType;
use App\Models\Exam;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationController extends Controller
{
    public function index ()
    {
        $user = Auth::user()->load('professional');
        $evaluations = Exam::where('professional_id', $user->professional->id)->paginate();
        return Inertia::render('Evaluations/Index', [
            'evaluations' => $evaluations
        ]);
    }

    public function indexAdmin ()
    {
        $evaluations = Exam::with('professional.user')->paginate();
        return Inertia::render('Evaluations/Index', [
            'evaluations' => $evaluations
        ]);
    }

    public function quiz() {
        return Inertia::render('Evaluations/Quiz', [
            'sections' => AskType::with('asks')->get(),
        ]);
    }

    public function store (Request $request) {
        $data = $request->validate([
            'answers' => 'required'
        ]);
        $protocol = Exam::create(['professional_id' => Auth::user()->professional->id]);
        foreach($data['answers'] as $answer){
            ExamAnswer::create([
                'exam_id' => $protocol->id,
                'ask_id' => $answer['question'],
                'answer' => $answer['value'],
            ]);
        }
        return response()->json(true);
    }

    public function destroy ($evaluation_id) {
        Exam::destroy($evaluation_id);
        $user = Auth::user();
        if ($user->role == 'admin') {
            $evaluations = Exam::paginate();
        }else{
            $evaluations = Exam::where('professional_id', $user->professional->id)->paginate();
        }   
        return response()->json($evaluations, 200);
    }

    //pdf

    public function export($evaluation_id)
    {
        $evaluation = Exam::with('professional.user')->where('id', $evaluation_id)->first();
        $pdf = Pdf::loadView('exportEvaluations', compact('evaluation'));
        return $pdf->stream();
        
    }

    public function export_masive()
    {
        $evaluations = Exam::with('professional.user')->get();
        $pdf = Pdf::loadView('exportMassiveEvaluations', compact('evaluations'));
        return $pdf->stream();
    }

    //excel
    public function exportExcel($evaluation_id)
    {
        return Excel::download(new EvaluationsExport($evaluation_id), 'evaluacion.xlsx');
    }

    
    public function exportMassiveExcel()
    {
        return Excel::download(new EvaluationsMassiveExport(), 'evaluaciones.xlsx');
    }
}