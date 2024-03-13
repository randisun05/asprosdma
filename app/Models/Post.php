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

    // public function scopeFilter ($query, array $filters)
    // {

    //     $query->when($filters['search'] ?? false, function($query, $search){
    //         return $query->where('title','like','%' . $search . '%')
    //                      ->orWhere('body','like','%' . $search . '%');
    //     });

    //     $query->when($filters['category'] ?? false, function($query, $category) {
    //         return $query->Wherehas('category', function($query) use ($category){
    //             $query->where('slug', $category);
    //         });
    //     });

    //     $query->when($filters['author'] ?? false, fn($query, $author) =>
    //         $query->Wherehas('author', fn($query) =>
    //             $query->where('username', $author)
    //         )
    //     );


    // }

    public function category()
    {
        return $this ->belongsTo(Category::class);
    }

    public function member()
    {
        return $this ->belongsTo(Member::class);
    }

}
