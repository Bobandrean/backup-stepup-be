<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsSchedule extends Model
{
    use HasFactory;

    protected $table = 'news_schedules';

    protected $fillable = [
        'id',
        'news_id',
        'shipment_date',
        'interval',
        'interval_type',
        'start_at',
        'end_at',
        'last_run',
        'next_run',
        'created_at',
        'updated_at',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
}
