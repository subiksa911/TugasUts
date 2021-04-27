<?php

namespace App\Imports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'Nama'=>$row[1],
            'Nim'=>$row[2],
            'Jurusan_Prodi'=>$row[3],
            'Alamat'=>$row[4]
        ]);
    }
}
