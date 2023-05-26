<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\AnswerChoice;


class AnswerQuestion extends Model
{
    use HasFactory;

    protected $table = 'answer_question';

    protected $fillable = [
        'id',
        'answer_id',
        'title',
        'created_at',
        'updated_at',
    ];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function answerChoice()
    {
        return $this->hasMany(AnswerChoice::class);
    }
}
