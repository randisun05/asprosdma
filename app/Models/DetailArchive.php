<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailArchive extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_id',
        'noticket',
        'user_id',
        'title',
        'detail',
        'document',
        'status',
        'dispositions',
        'action',
        'reaction',
        'from',
        'isi',
    ];

    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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




}
