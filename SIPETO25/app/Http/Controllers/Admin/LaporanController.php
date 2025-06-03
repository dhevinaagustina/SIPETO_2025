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

        $query = Mahasiswa::with('pendaftaranToeic'); // Eager load relasi
        
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        if ($format === 'pdf') {
            $mahasiswa = $data->map(function($item) {
                return [
                    'nim' => $item->nim,
                    'nama' => $item->nama_mahasiswa, // Pastikan ini nama field yang benar
                    'email' => $item->email,
                    'tanggal_daftar' => $item->created_at,
                    'status' => optional($item->pendaftaranToeic)->status ?? 'Belum Daftar'
                ];
            });
            
            $pdf = PDF::loadView('admin.laporan.export_pdf', [
                'mahasiswa' => $mahasiswa,
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

    public function exportPdf()
    {
        $mahasiswa = Mahasiswa::select('nim', 'nama_mahasiswa as nama', 'email', 'created_at as tanggal_daftar')
            ->with(['pendaftaranToeic' => function($query) {
                $query->select('id_mahasiswa', 'status');
            }])
            ->orderBy('nim')
            ->get()
            ->map(function($item) {
                return [
                    'nim' => $item->nim,
                    'nama' => $item->nama,
                    'email' => $item->email,
                    'tanggal_daftar' => $item->tanggal_daftar,
                    'status' => $item->pendaftaranToeic ? $item->pendaftaranToeic->status : 'Belum Daftar'
                ];
            });
        
        $pdf = PDF::loadView('admin.laporan.export_pdf', [
            'mahasiswa' => $mahasiswa
        ]);
        
        return $pdf->download('laporan_mahasiswa_'.date('Ymd').'.pdf');
    }
}