<?php

namespace App\Imports;

use App\Perencanaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PerencanaanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perencanaan([
            
            'tanggal' => $row[1], 
            'deskripsi' => $row[2],
            'kode' => $row[3],
            'debit' => $row[4],
            'kredit' => $row[5],

        ]);
    }
}
