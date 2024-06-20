<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventParticipantsExport implements FromCollection, WithMapping, WithHeadings
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
            "'" .$datas->member->nip,
            $datas->member->name,
            $datas->member->email,
            $datas->member->agency,
            $datas->member->position,
            $datas->member->level,
            $datas->member->created_at,
        ] ;
    }

    public function headings() : array {
        return [
           'NIP',
           'Nama',
           'Email',
           'Instansi',
           'Jabatan',
           'Jenjang',
           'Tanggal',
        ] ;
    }
}
