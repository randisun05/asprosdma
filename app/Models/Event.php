<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'date',
        'enddate',
        'place',
        'link',
        'team',
        'participant',
        'image',
        'status',
      
    ];

    
}
