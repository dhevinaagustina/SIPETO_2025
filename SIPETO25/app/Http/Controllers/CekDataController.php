<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;

use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CekDataExport;
use Illuminate\Support\Fluent;

class CekDataController extends Controller
{
    // Tampilkan halaman cek data
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $sudahMendaftar = PendaftaranToeic::distinct('id_mahasiswa')->count('id_mahasiswa');

        return view('admin.cekdata', compact('totalMahasiswa', 'sudahMendaftar'));

        return view('admin.cekdata', [
            'totalMahasiswa' => $totalMahasiswa,
            'sudahMendaftar' => $sudahMendaftar,
            'jadwalMendatang' => $jadwalMendatang,
            'breadcrumb' => new Fluent([
                'title' => 'Daftar Mahasiswa',
                'list'  => ['Cek Data']
            ]),
            'activeMenu' => 'cek-data' // This matches the 'key' in your sidebar menu
    }

    // Ambil data untuk DataTables
    public function getData(Request $request)
    {
        $subquery = DB::table('pendaftaran_toeic as pt1')
            ->select('pt1.*')
            ->whereRaw('pt1.id = (
                SELECT MAX(pt2.id) FROM pendaftaran_toeic pt2
                WHERE pt2.id_mahasiswa = pt1.id_mahasiswa
            )');

        $query = Mahasiswa::query()
            ->leftJoinSub($subquery, 'pt', 'mahasiswa.id_mahasiswa', '=', 'pt.id_mahasiswa')
            ->select([
                'mahasiswa.id_mahasiswa',
                'mahasiswa.nim',
                'mahasiswa.nama_mahasiswa as nama',
                'mahasiswa.jurusan',
                'mahasiswa.prodi',
                'pt.tipe_ujian as status_pendaftaran',
            ]);

        // Filter jurusan jika dikirim dari DataTables
        if ($request->filled('jurusan')) {
            $query->where('mahasiswa.jurusan', $request->jurusan);
        }

        // Pencarian manual (nama/NIM)
        $search = $request->input('search.value');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('mahasiswa.nama_mahasiswa', 'like', "%$search%")
                  ->orWhere('mahasiswa.nim', 'like', "%$search%");
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('status_pendaftaran', fn($row) => $row->status_pendaftaran ?? '-')
            ->make(true);
    }
}
