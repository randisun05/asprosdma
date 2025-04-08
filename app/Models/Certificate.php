<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'no_certificate',
        'nip',
        'name',
        'body',
        'date',
        'template',
        'status',
        'qr_code',
        'link',
        'doc',
        'category'
    ];

    public function event()
    {
        return $this ->belongsTo(Event::class);
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
