<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $table =  'asks';

    protected $fillable = [
        'ask',
        'ask_type_id'
    ];

    //relations
    public function ask_type() {
        return $this->belongsTo(AskType::class);
    }
}
