<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'province_id'
    ];

}
