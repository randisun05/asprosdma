<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'color',
        'price',
        'body',
        'image',
        'how',
        'status',
    ];
}
