<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MemberExport implements FromCollection, WithMapping, WithHeadings
{
    protected $datas;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($datas) {
        $this->datas = $datas;
    }

    public function collection()
    {
        return $this->datas;
    }

    public function map($datas) : array {
        return [
            $datas->main->nomember,
            "'" .$datas->main->nip,
            $datas->main->name,
            $datas->main->email,
            "'" .$datas->main->contact,
            $datas->agency,
            $datas->position,
            $datas->level,
            $datas->created_at,
        ] ;
    }

    public function headings() : array {
        return [
           'No_Anggota',
           'NIP',
           'Nama',
           'Email',
           'Kontak',
           'Instansi',
           'Jabatan',
           'Jenjang',
           'Tanggal',
        ] ;
    }
}
