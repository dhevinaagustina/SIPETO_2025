<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PendaftaranToeic;
use App\Models\HasilUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $jadwalMendatang = 0; // Ganti jika kamu punya tabel jadwal_ujian nanti

        return view('admin.cekdata', [
            'totalMahasiswa' => $totalMahasiswa,
            'sudahMendaftar' => $sudahMendaftar,
            'jadwalMendatang' => $jadwalMendatang,
            'breadcrumb' => new Fluent([
                'title' => 'Daftar Mahasiswa',
                'list'  => ['Cek Data']
            ]),
            'activeMenu' => 'cek-data' // This matches the 'key' in your sidebar menu
        ]);
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
            ->leftJoin('hasil_ujian as hu', 'pt.id', '=', 'hu.id_pendaftaran_toeic')
            ->select([
                'mahasiswa.id_mahasiswa',
                'mahasiswa.nim',
                'mahasiswa.nama_mahasiswa as nama',
                'mahasiswa.jurusan',
                'mahasiswa.prodi',
                'pt.tipe_ujian as status_pendaftaran',
                'hu.status as status_ujian'
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
            ->editColumn('status_ujian', fn($row) => $row->status_ujian ?? '-')
            ->make(true);
    }

    // Export ke Excel
    public function exportExcel()
    {
        return Excel::download(new CekDataExport, 'cek_data_mahasiswa.xlsx');
    }

    // Export ke PDF
    public function exportPDF()
    {
        $data = Mahasiswa::with([
            'pendaftaranToeic' => function ($query) {
                $query->orderBy('id', 'desc')->take(1)->with('hasilUjian');
            }
        ])->get();

        $pdf = Pdf::loadView('admin.exports.cekdata_pdf', compact('data'));
        return $pdf->download('cek_data_mahasiswa.pdf');
    }

    // Simpan hasil ujian
    public function store(Request $request)
    {
        $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran_toeic,id',
            'skor_listening' => 'required|integer|min:0|max:495',
            'skor_reading' => 'required|integer|min:0|max:495',
            'tanggal_ujian' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        $pendaftaran = PendaftaranToeic::findOrFail($request->id_pendaftaran);

        if (!$pendaftaran->id_mahasiswa) {
            $msg = 'Data mahasiswa tidak ditemukan.';
            if ($request->ajax()) {
                return response()->json(['message' => $msg], 422);
            }
            return redirect()->back()->with('error', $msg);
        }

        // HasilUjian::updateOrCreate(
        //     [
        //         'id_pendaftaran_toeic' => $pendaftaran->id,
        //         'id_mahasiswa' => $pendaftaran->id_mahasiswa,
        //     ],
        //     [
        //         'skor_listening' => $request->skor_listening,
        //         'skor_reading' => $request->skor_reading,
        //         'skor_total' => $request->skor_listening + $request->skor_reading,
        //         'tanggal_ujian' => $request->tanggal_ujian,
        //         'status' => $request->status,
        //     ]
        // );

        if ($request->ajax()) {
            return response()->json(['message' => 'Hasil ujian berhasil disimpan.']);
        }
        return redirect()->back()->with('success', 'Hasil ujian berhasil disimpan.');
    }
}
