<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class KeuanganReport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $datas;

    public function __construct($datas) {
        $this->datas = $datas;
    }

    public function collection()
    {
        return $this->datas;
    }

    public function map($datas) : array {
        return [
            $datas->title,
            $datas->date,
            $datas->type === 'debit' ? $datas->nominal : 0,
            $datas->type === 'kredit' ? $datas->nominal : 0,
            $datas->saldo,
            "asprosdma.id/storage/" . ($datas->bukti ?? ''),

        ] ;
    }
    public function headings() : array {
        return [
           'Keterangan',
           'Tanggal',
           'Pemasukan',
           'Pengeluaran',
           'Saldo',
           'Bukti',
        ] ;
    }
}
