<?php

namespace App\Exports;

use App\Models\LetterType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KlasifikasiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letter_type::with('letter')->get();
    }
    public function headings(): array
    {
        return [
            "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }

    public function map($item): array
    {
        $surat_tertaut = count($item->letter);

        if($surat_tertaut < 1){
            $surat_tertaut = "0";
        }

        return [
            $item->letter_code,
            $item->name_type,
            $surat_tertaut,
        ];
    }
}

