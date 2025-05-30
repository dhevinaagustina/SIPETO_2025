<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class MahasiswaExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                'NIM' => $item->nim,
                'Nama' => $item->nama_mahasiswa,
                'Email' => $item->email,
                'Tanggal Daftar' => $item->created_at->format('d/m/Y'),
                'Status' => $item->pendaftaranToeic ? 'Terdaftar TOEIC' : 'Belum Daftar'
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIM',
            'Nama',
            'Email',
            'Tanggal Daftar',
            'Status'
        ];
    }
}