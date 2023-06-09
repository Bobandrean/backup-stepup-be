<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Quiz;
use App\Models\AnswerQuestion;


class Answer extends Model
{
    use HasFactory;

    public $table = 'answers';

    protected $fillable = [
        'id',
        'user_id',
        'quiz_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answerQuestion()
    {
        return $this->hasMany(AnswerQuestion::class);
    }
}
