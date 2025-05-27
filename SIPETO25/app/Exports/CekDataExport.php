<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CekDataExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Ambil data mahasiswa + pendaftaran terbaru + status ujian
        $subquery = PendaftaranToeic::select('pendaftaran_toeic.*')
            ->whereRaw('pendaftaran_toeic.id = (
                SELECT MAX(pt2.id) FROM pendaftaran_toeic pt2
                WHERE pt2.id_mahasiswa = pendaftaran_toeic.id_mahasiswa
            )');

        return Mahasiswa::query()
            ->leftJoinSub($subquery, 'pt', 'mahasiswa.id_mahasiswa', '=', 'pt.id_mahasiswa')
            ->leftJoin('hasil_ujian as hu', 'pt.id', '=', 'hu.id_pendaftaran_toeic')
            ->select([
                'mahasiswa.nim',
                'mahasiswa.nama_mahasiswa',
                'mahasiswa.jurusan',
                'mahasiswa.prodi',
                'pt.tipe_ujian as status_pendaftaran',
                'hu.status as status_ujian'
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Jurusan',
            'Prodi',
            'Status Pendaftaran',
            'Status Ujian'
        ];
    }
}