<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'noticket',
        'nip',
        'name',
        'email',
        'agency',
        'title',
        'category',
        'detail',
        'dispositions',
        'status',
        'reaction',
        'position',
        'contact',
        'document',
        'isi',
    ];


    protected $keyType = 'string'; // Menetapkan tipe kunci ke string
    protected $primaryKey = 'id'; // Menetapkan nama primary key
    public $incrementing = false; // Menonaktifkan auto increment

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Menggunakan ULID saat membuat instance baru
            $model->id = (string) Str::orderedUuid();
        });
    }

    public function detailArchive()
    {
        return $this->belongsTo(DetailArchive::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
