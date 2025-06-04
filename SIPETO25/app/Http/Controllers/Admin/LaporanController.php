<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Exports\MahasiswaExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function pendaftaran()
    {
        $breadcrumb = (object) [
            'title' => 'Laporan Pendaftaran',
            'list' => ['Admin', 'Laporan', 'Pendaftaran']
        ];

        $activeMenu = 'laporan';

        $startDate = request()->input('start_date', Carbon::now()->subMonth()->format('Y-m-d'));
        $endDate = request()->input('end_date', Carbon::now()->format('Y-m-d'));

        // Ambil hanya mahasiswa yang memiliki pendaftaran TOEIC di rentang tanggal
        $mahasiswa = Mahasiswa::whereHas('pendaftaranToeic', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        })->with('pendaftaranToeic')->get();

        return view('admin.laporan.pendaftaran', compact(
            'breadcrumb',
            'activeMenu',
            'mahasiswa',
            'startDate',
            'endDate'
        ));
    }


     public function generate(Request $request)
    {
        $validated = $request->validate([
            'format' => 'required|in:excel,pdf'
        ]);

        return redirect()->route('admin.laporan.export', [
            'format' => $validated['format']
        ]);
    }

    public function export(Request $request)
    {
        $format = $request->query('format', 'excel');

        $data = Mahasiswa::with('pendaftaranToeic')
            ->whereHas('pendaftaranToeic') // hanya yang sudah daftar TOEIC
            ->orderBy('nim')
            ->get();

        if ($format === 'pdf') {
            $mahasiswa = $data->map(function ($item) {
                $pendaftaran = $item->pendaftaranToeic->first(); // ambil yang pertama
                return [
                    'nim' => $item->nim,
                    'nama' => $item->nama_mahasiswa,
                    'email' => $item->email,
                    'tanggal_daftar' => optional($pendaftaran)->created_at,
                    'status' => $pendaftaran ? 'Terdaftar' : 'Belum Daftar'
                ];
            });

            $pdf = PDF::loadView('admin.laporan.export_pdf', [
            'mahasiswa' => $mahasiswa
            ])->setPaper('a4', 'landscape');

            return $pdf->download('laporan-pendaftaran-toeic-' . now()->format('Y-m-d') . '.pdf');
        }

        // Untuk export Excel
        return Excel::download(new MahasiswaExport($data), 'laporan-pendaftaran-toeic-' . now()->format('Y-m-d') . '.xlsx');
    }

    public function index()
    {
        return view('admin.laporan.index');
    }
}