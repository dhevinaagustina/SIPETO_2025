<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Fluent;

class RiwayatUjianController extends Controller
{
    public function index()
    {
        return view('admin.riwayatujian', [
            'activeMenu' => 'riwayat-ujian',
            'breadcrumb' => new Fluent([
                'title' => 'Daftar Riwayat Ujian Mahasiswa',
                'list'  => ['Riwayat Ujian']
            ])
        ]);
    }

    public function getData(Request $request)
    {
        // Ambil data mahasiswa yang pendaftarannya valid
        $query = DB::table('pendaftaran_toeic as pt')
            ->join('mahasiswa as m', 'pt.id_mahasiswa', '=', 'm.id_mahasiswa')
            ->whereNotNull('pt.scan_ktm')
            ->whereNotNull('pt.scan_ktp')
            ->whereNotNull('pt.pas_foto')
            ->where('pt.scan_ktm', '!=', '-')
            ->where('pt.scan_ktp', '!=', '-')
            ->where('pt.pas_foto', '!=', '-')
            ->groupBy('m.id_mahasiswa', 'm.nim', 'm.nama_mahasiswa')
            ->select([
                'm.id_mahasiswa as id',
                'm.nim',
                'm.nama_mahasiswa as nama',
                DB::raw("GROUP_CONCAT(DISTINCT pt.tipe_ujian ORDER BY pt.tipe_ujian SEPARATOR ' & ') as status_pendaftaran")
            ]);

        // Filter nama
        if ($request->filled('nama')) {
            $query->having('nama', 'like', '%' . $request->nama . '%');
        }

        // Filter status
        if ($request->filled('status')) {
            $status = $request->status;

            if ($status === 'gratis') {
                $query->havingRaw("status_pendaftaran = 'gratis'");
            } elseif ($status === 'mandiri') {
                $query->havingRaw("status_pendaftaran = 'mandiri'");
            } elseif ($status === 'gratis & mandiri') {
                $query->havingRaw("status_pendaftaran LIKE '%gratis%' AND status_pendaftaran LIKE '%mandiri%'");
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->filter(function ($instance) {
                // optional custom filter
            })
            ->editColumn('id', function ($row) {
                // Cek apakah sudah ada di riwayat_ujian
                $exists = DB::table('riwayat_ujian')->where('id_mahasiswa', $row->id)->exists();

                if (!$exists) {
                    DB::table('riwayat_ujian')->insert([
                        'id_mahasiswa' => $row->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }

                return $row->id;
            })
            ->make(true);
    }
}
