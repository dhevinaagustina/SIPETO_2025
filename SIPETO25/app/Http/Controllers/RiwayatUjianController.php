<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RiwayatUjianController extends Controller
{
    public function index()
    {
        return view('admin.riwayatujian');
    }

    public function getData(Request $request)
    {
        // Ambil hanya pendaftaran TOEIC yang valid (berhasil daftar)
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

        // Filter status: Gratis, Mandiri, atau keduanya
        if ($request->filled('status')) {
            $status = $request->status;

            if ($status === 'Gratis') {
                $query->havingRaw("status_pendaftaran = 'gratis'");
            } elseif ($status === 'Mandiri') {
                $query->havingRaw("status_pendaftaran = 'mandiri'");
            } elseif ($status === 'Gratis & Mandiri') {
                $query->havingRaw("status_pendaftaran LIKE '%gratis%' AND status_pendaftaran LIKE '%mandiri%'");
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->make(true);
    }
}
