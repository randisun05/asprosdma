<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CertificateImport implements ToCollection, WithHeadingRow
{
    // Kita biarkan kosong karena proses simpan akan dilakukan di Controller
    public function collection(Collection $rows)
    {
        return $rows;
    }
}
