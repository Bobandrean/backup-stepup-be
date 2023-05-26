<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quiz;


class Question extends Model
{
    use HasFactory;


    protected $table = 'question';

    protected $fillable = [
        'id',
        'quiz_id',
        'title',
        'created_at',
        'updated_at',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function choice()
    {
        return $this->hasMany(Choice::class);
    }
}
