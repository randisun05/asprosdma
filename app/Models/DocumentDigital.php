<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocumentDigital extends Model
{
    use HasFactory;
    protected $fillable = [
        'perihal',
        'no_surat',
        'jenis',
        'speciment',
        'nipttd',
        'anchor',
        'qrcode',
        'nipparaf',
        'tujuan',
        'kategori',
        'document',
        'description',
        'status',
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

}
