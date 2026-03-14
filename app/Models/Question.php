<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'text',
        'a',
        'b',
        'c',
        'd',
        'e',
        'answer',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
