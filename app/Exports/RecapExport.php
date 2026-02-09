<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecapExport implements FromArray, ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Membuat baris pertama (Judul) menjadi Tebal
            1 => ['font' => ['bold' => true, 'size' => 14]],
            // Memberikan style tebal untuk sub-header (opsional)
            'A' => ['font' => ['bold' => false]],
        ];
    }
}
