<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quiz';

    protected $fillable = [
        'id',
        'module_name',
        'per_page',
        'start_date',
        'end_date',
        'published_at',
        'questions_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
