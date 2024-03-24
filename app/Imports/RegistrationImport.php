<?php

namespace App\Imports;

use App\Models\Registration;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RegistrationImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Registration([   
            'nip' => (int) $row['nip'],
            'name' => $row['name'],
            'email' => $row['email'],
            'contact' => $row['kontak'],
            'agency' => $row['instansi'],
            'position' => $row['jabatan'],
            'level' => $row['jenjang'],
            'from' => "collective",
        
        ]);
        // Membuat array data untuk dikembalikan
// $data = [
//     'nip' => (int) $row['nip'],
//     'name' => $row['name'],
//     'email' => $row['email'],
//     'contact' => $row['kontak'],
//     'agency' => $row['instansi'],
//     'position' => $row['jabatan'],
//     'level' => $row['jenjang'],
//     'document_jab' => $documentJab, 
//     'paid' => $row['paid'],
// ];

// return $data;
        
    }

    public function rules(): array
    {
        return [
            'nip' => 'unique:registrations,nip',
        ];
    }
}
