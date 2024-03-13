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
        'desc',
        
    ];  

    public function event()
    {
        return $this ->belongsTo(Event::class);
    }

    public function member()
    {
        return $this ->belongsTo(Member::class);
    }
}
