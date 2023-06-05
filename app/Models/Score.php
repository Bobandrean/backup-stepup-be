<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Quiz;

class Score extends Model
{
    use HasFactory;


    public $table = 'score';

    protected $fillable = [
        'id',
        'id_quiz',
        'id_user',
        'total_question',
        'correct_answer',
        'wrong_answer',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
}
