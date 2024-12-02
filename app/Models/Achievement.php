<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'title',
        'category',
        'document',
        'image',
        'icon',
        'description',
        'date',
        'status',
    ];

    public function member()
    {
        return $this ->belongsTo(Member::class);
    }

}
