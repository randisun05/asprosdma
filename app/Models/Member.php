<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'password',
        'nomember',
        'agency'
    ];


}
