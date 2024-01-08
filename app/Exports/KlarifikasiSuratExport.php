<?php

namespace App\Exports;

use App\Models\LetterType;
use Maatwebsite\Excel\Concerns\FromCollection;

class KlarifikasiSuratExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LetterType::all();
    }
}
