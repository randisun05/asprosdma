<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationPaid implements FromCollection, WithMapping, WithHeadings
{
    protected $paids;

    /**
     * __construct
     *
     * @param  mixed $grade
     * @return void
     */
    public function __construct($paids) {
        $this->paids = $paids;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->paids;
    }

    public function map($paids) : array {
        return [
            $paids->name,
            $paids->agency,
            $paids->position.' '.$paids->level,
            $paids->email,
            $paids->contact,
            "https://asprosdma.id/storage/".$paids->paid
        ] ;
    }

    public function headings() : array {
        return [
           'Nama',
           'Instansi',
           'Jabatan',
           'Email',
           'Kontak',
           'Link',
           'Status Bayar',
        ] ;
    }
}
