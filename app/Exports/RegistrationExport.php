<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationExport implements FromCollection, WithMapping, WithHeadings
{
    protected $datas;

    /**
     * __construct
     *
     * @param  mixed $grade
     * @return void
     */
    public function __construct($datas) {
        $this->datas = $datas;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->datas;
    }

    public function map($datas) : array {
        return [
            $datas->id,
            "'" .$datas->nip,
            $datas->name,
            $datas->email,
            "'" .$datas->contact,
            $datas->agency,
            $datas->position,
            $datas->level,
            $datas->document_jab,
        ] ;
    }

    public function headings() : array {
        return [
           'ID',
           'NIP',
           'Nama',
           'Email',
           'Kontak',
           'Instansi',
           'Jabatan',
           'Jenjang',
           'Dokumen',
        ] ;
    }
}
