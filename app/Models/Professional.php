<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $table = 'professionals';

    protected $fillable = [
        'country',
        'region',
        'province',
        'professional_years',
        'study_program',
        'institution',
        'age',
        'gender',
        'user_id'
    ];

    //relations
    public function user() {
        return $this->belongsTo(User::class);
    }
}
