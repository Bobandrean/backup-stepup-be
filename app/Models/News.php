<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Files;
use App\Models\NewsSchedule;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'slug',
        'hidden_flag',
        'short_content',
        'image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $table = 'news';

    public function files()
    {
        return $this->hasMany(Files::class, 'news_id');
    }

    public function newsSchedule()
    {
        return $this->hasOne(NewsSchedule::class, 'news_id');
    }
}
