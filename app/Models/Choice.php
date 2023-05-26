<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;


    protected $table = 'choice';

    protected $fillable = [
        'id',
        'question_id',
        'choice',
        'is_correct',
        'created_at',
        'updated_at',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
