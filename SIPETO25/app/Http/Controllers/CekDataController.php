<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Fluent;

class CekDataController extends Controller
{
    /**
     * Tampilkan halaman cek data TOEIC (admin).
     */
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $sudahMendaftar = PendaftaranToeic::distinct('id_mahasiswa')->count('id_mahasiswa');

        return view('admin.cekdata', [
            'totalMahasiswa' => $totalMahasiswa,
            'sudahMendaftar' => $sudahMendaftar,
            'breadcrumb' => new Fluent([
                'title' => 'Daftar Mahasiswa',
                'list'  => ['Cek Data']
            ]),
            'activeMenu' => 'cek-data',
        ]);
    }

    /**
     * Ambil data mahasiswa + status pendaftaran TOEIC terbaru (DataTables).
     */
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
                'mahasiswa.nama_mahasiswa',
                'mahasiswa.jurusan',
                'mahasiswa.prodi',
                'pt.id as id_pendaftaran'
            ]);

        if ($request->filled('jurusan')) {
            $query->where('mahasiswa.jurusan', $request->jurusan);
        }

        $search = $request->input('searchMahasiswa') ?? $request->input('search.value');
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('mahasiswa.nama_mahasiswa', 'like', "%{$search}%")
                  ->orWhere('mahasiswa.nim', 'like', "%{$search}%");
            });
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('dokumen', function ($row) {
                return $row->id_pendaftaran
                    ? '<a href="' . route('cekdata.admin.cek-dokumen', $row->id_pendaftaran). '" class="btn btn-info btn-sm">Lihat Dokumen</a>'
                    : '<span class="text-muted">Belum mendaftar</span>';
            })
            ->rawColumns(['dokumen'])
            ->make(true);
    }

    // Method untuk menampilkan detail dokumen pendaftaran TOEIC
    public function showDokumen($id)
    {
        $pendaftaran = PendaftaranToeic::with('mahasiswa')->findOrFail($id);
        $mahasiswa = $pendaftaran->mahasiswa;
        $activeMenu = 'cek-data'; // tambahkan ini

        return view('admin.detail_dokumen', compact('pendaftaran', 'mahasiswa'));
    }
}
