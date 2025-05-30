<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Exports\MahasiswaExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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

        $mahasiswa = Mahasiswa::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        return view('admin.laporan.pendaftaran', compact(
            'breadcrumb',
            'activeMenu',
            'mahasiswa',
            'startDate',
            'endDate'
        ));
    }

    public function export()
    {
        $format = request()->query('format', 'excel');
        $startDate = request()->query('start_date');
        $endDate = request()->query('end_date');

        $query = Mahasiswa::query();
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        if ($format === 'pdf') {
            $pdf = PDF::loadView('admin.laporan.export_pdf', [
                'data' => $data,
                'startDate' => $startDate,
                'endDate' => $endDate
            ]);
            return $pdf->download('laporan-mahasiswa-'.now()->format('Y-m-d').'.pdf');
        }

        return Excel::download(new MahasiswaExport($data), 'data-mahasiswa.xlsx');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'format' => 'required|in:excel,pdf'
        ]);

        return redirect()->route('admin.laporan.export', [
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'format' => $validated['format']
        ]);
    }
}