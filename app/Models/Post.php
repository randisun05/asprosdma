<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'excerpt',
        'category_id',
        'image',
        'document',
        'member_id',
        'status',
        'publish_at',
    ];


    public function category()
    {
        return $this ->belongsTo(Category::class);
    }

    public function member()
    {
        return $this ->belongsTo(Member::class);
    }

    public function react()
    {
        return $this ->hasMany(ReactDetail::class);
    }

}
