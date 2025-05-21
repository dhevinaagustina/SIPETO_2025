<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;


class CekDataController extends Controller
{
    private $mahasiswa = [
        [
            'nim' => '2341760071',
            'nama' => 'Niriza Lailamuli Hidayat',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'D-IV Sistem Informasi Bisnis',
            'status' => 'Sudah Ujian'
        ],
        [
            'nim' => '2341760072',
            'nama' => 'Adinda Ivanka Maysanda Putri',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'D-IV Sistem Informasi Bisnis',
            'status' => 'Sudah Ujian'
        ],
        [
            'nim' => '2341760073',
            'nama' => 'Adyuta Raksa Ramadhana',
            'jurusan' => 'Teknologi Informasi',
            'prodi' => 'D-IV Sistem Informasi Bisnis',
            'status' => 'Belum Ujian'
        ],
        [
            'nim' => '2341760074',
            'nama' => 'Agung Prasetyo',
            'jurusan' => 'Teknik Elektro',
            'prodi' => 'D-III Teknik Listrik',
            'status' => 'Sudah Ujian'
        ],
        [
            'nim' => '2341760075',
            'nama' => 'Bella Anastasya',
            'jurusan' => 'Teknik Mesin',
            'prodi' => 'D-III Teknik Mesin',
            'status' => 'Tidak Hadir'
        ],
    ];

    public function index()
    {
        $mahasiswa = $this->mahasiswa;
        return view('admin.cekdata', compact('mahasiswa'));
    }

   public function exportExcel()
{
    $data = collect($this->mahasiswa); // konversi array ke collection
    return Excel::download(new MahasiswaExport($data), 'data_mahasiswa.xlsx');
}

    public function exportPDF()
    {
        $mahasiswa = $this->mahasiswa;
        $pdf = PDF::loadView('admin.cekdata_pdf', compact('mahasiswa'));
        return $pdf->download('data_mahasiswa.pdf');
    }
}
