<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public $table = 'answer';

    protected $fillable = [
        'id',
        'question_id',
        'answer',
        'is_correct',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
