<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class MahasiswaExport implements FromCollection
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $rows = collect();
        $rows->push(['No', 'NIM', 'Nama', 'Jurusan', 'Prodi', 'Status']);

        foreach ($this->data as $index => $mhs) {
            $rows->push([
                $index + 1,
                $mhs['nim'],
                $mhs['nama'],
                $mhs['jurusan'],
                $mhs['prodi'],
                $mhs['status']
            ]);
        }

        return $rows;
    }
}