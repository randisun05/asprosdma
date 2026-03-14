<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'member_id',
        'title',
        'status',
        'doc',
        'sert',
        'desc',
        'result',
        'duration',
        'start_at',
        'end_at',
        'total_correct',
        'grade',
    ];

    public function event()
    {
        return $this ->belongsTo(Event::class);
    }

    public function member()
    {
        return $this ->belongsTo(Member::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }


}
