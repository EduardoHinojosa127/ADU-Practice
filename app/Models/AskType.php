<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskType extends Model
{
    use HasFactory;

    protected $table = 'ask_types';

    protected $fillable = [
        'description'
    ];

    //relations
    public function asks() {
        return $this->hasMany(Ask::class);
    }
}
