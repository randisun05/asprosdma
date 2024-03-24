<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileDataPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_id',
        'agency',
        'unit',
        'subunit',
        'position',
        'tmtpos',
        'location',
        'golru',
        'tmtgolru',
        'wyear',
        'wmonth',
        'type',
        'status',
        'level',
    ];

    public function main()
    {
        return $this->belongsTo(ProfileDataMain::class);
    }

}
