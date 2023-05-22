<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'news_id',
        'filename',
        'filepath',
        'extension',
        'created_at',
        'updated_at',
    ];

    public $table = 'files';

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
