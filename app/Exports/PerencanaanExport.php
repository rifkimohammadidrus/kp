<?php

namespace App\Exports;

use App\Perencanaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerencanaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perencanaan::all();
    }
}
