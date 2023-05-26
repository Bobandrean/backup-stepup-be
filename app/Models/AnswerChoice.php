<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerChoice extends Model
{
    use HasFactory;


    protected $table = 'answer_choice';


    protected $fillable = [
        'id',
        'answer_question_id',
        'choice_text',
        'is_correct',
        'is_selected',
        'created_at',
        'updated_at',
    ];

    public function answerQuestion()
    {
        return $this->belongsTo(AnswerQuestion::class);
    }
}
