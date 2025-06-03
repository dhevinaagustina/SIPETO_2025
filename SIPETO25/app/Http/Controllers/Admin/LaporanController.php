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
        'format' => 'required|in:excel,pdf',
    ]);

    $format = $validated['format'];

    // Ambil mahasiswa yang punya pendaftaran TOEIC
    $data = Mahasiswa::whereHas('pendaftaranToeic')
        ->with('pendaftaranToeic')
        ->get();

    if ($format === 'pdf') {
        $pdf = PDF::loadView('admin.laporan.export_pdf', [
            'data' => $data,
        ])->setPaper('a4', 'landscape'); // orientasi landscape

        return $pdf->download('laporan-pendaftaran-toeic-' . now()->format('Y-m-d') . '.pdf');
    }

    // Export ke Excel
    return Excel::download(new MahasiswaExport($data), 'laporan-pendaftaran-toeic-' . now()->format('Y-m-d') . '.xlsx');
}
}