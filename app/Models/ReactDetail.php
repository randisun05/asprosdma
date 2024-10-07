<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'member_id',
        'react_id',
        'status',
        'type',
        'desc',

    ];
}
