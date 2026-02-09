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
        // Determine the label based on agency_type
    if ($datas->agency_type == 'BKN Pusat') {
        $typeLabel = 'Instansi Pusat';
    } else {
        $typeLabel = 'Instansi Daerah';
    }

        return [
            $datas->main->nomember,
            "'" .$datas->main->nip,
            $datas->main->name,
            $datas->main->gender,
            $datas->main->email,
            "'" .$datas->main->contact,
            $datas->agency,
            $typeLabel,
            $datas->agency_type,
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
           'Gender',
           'Email',
           'Kontak',
           'Instansi',
           'Jenis Instansi',
           'Wilayah',
           'Jabatan',
           'Jenjang',
           'Tanggal',
        ] ;
    }
}
