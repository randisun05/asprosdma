<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'detail_event_id',
        'question_id',
        'member_id',
        'question_order',
        'answer_order',
        'answer',
        'is_correct',
    ];

    protected $hidden = [
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function detailEvent()
    {
        return $this->belongsTo(DetailEvent::class);
    }
}
