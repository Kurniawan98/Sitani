<?php

namespace App\Imports;

use App\HargaPangan;
use Maatwebsite\Excel\Concerns\ToModel;

class HargaPanganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HargaPangan([
            'id_category' => $row[0],
            'namapangan' => $row[1],
            'harga' => $row[2],
            'tanggal' => $row[3],
        ]);
    }
}
