<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    use HasFactory;

    protected $table = 'exam_answers';

    protected $fillable = [
        'exam_id',
        'ask_id',
        'answer'
    ];

    //relations

    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function ask () {
        return $this->belongsTo(Ask::class);
    }
}
