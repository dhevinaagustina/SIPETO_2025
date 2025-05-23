<?php

// app/Http/Controllers/CekDataController.php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MahasiswaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\DataTables;

class CekDataController extends Controller
{
    public function index()
    {
        // Hitung data untuk info box
        $totalMahasiswa = Pendaftaran::count();
        $sudahUjian = Pendaftaran::where('status_ujian', 'Sudah Ujian')->count();
        $belumUjian = Pendaftaran::where('status_ujian', 'Belum Ujian')->count();
        $jadwalMendatang = 0; // Ganti dengan jumlah jadwal dari tabel jadwal jika ada

        return view('admin.cekdata', compact(
            'totalMahasiswa',
            'sudahUjian',
            'belumUjian',
            'jadwalMendatang'
        ));
    }

    public function exportExcel()
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->get();
        return Excel::download(new MahasiswaExport($pendaftaran), 'data_mahasiswa.xlsx');
    }

    public function exportPDF()
    {
        $pendaftaran = Pendaftaran::with('mahasiswa')->get();
        $pdf = Pdf::loadView('admin.cekdata_pdf', compact('pendaftaran'));
        return $pdf->download('data_mahasiswa.pdf');
    }

    public function getData(Request $request)
    {
        $query = Pendaftaran::with('mahasiswa');

        if ($request->has('jurusan') && $request->jurusan != '') {
            $query->whereHas('mahasiswa', function ($q) use ($request) {
                $q->where('jurusan', $request->jurusan);
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('nim', fn($row) => $row->mahasiswa->nim ?? '-')
            ->editColumn('nama', fn($row) => $row->mahasiswa->nama_mahasiswa ?? '-')
            ->editColumn('jurusan', fn($row) => $row->mahasiswa->jurusan ?? '-')
            ->editColumn('prodi', fn($row) => $row->mahasiswa->prodi ?? '-')
            ->editColumn('status', function($row) {
                if ($row->status_ujian === 'Sudah Ujian') {
                    return '<span class="badge badge-success">Sudah Ujian</span>';
                } elseif ($row->status_ujian === 'Belum Ujian') {
                    return '<span class="badge badge-warning text-dark">Belum Ujian</span>';
            })
            ->rawColumns(['status'])
            ->make(true);
    }
}
