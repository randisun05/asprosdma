<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nominal',
        'type',
        'saldo',
        'coa',
        'kategori',
        'keterangan',
        'nomor',
        'date',
        'bukti'
    ];
}
