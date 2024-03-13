<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileDataMain extends Model
{
    use HasFactory;

    protected $fillable = [
            'nip',
            'name',
            'fname',
            'lname',
            'email',
            'place',
            'dob',
            'docid',
            'nodocid',
            'contact',
            'gender',
            'address',
            'province',
            'regency',
            'district',
            'villages',
            'type',
            'status',
            'tmt-cpns',
            'tmt-pns',
            'leveledu',
            'lastedu',    
    ];  

   

}
