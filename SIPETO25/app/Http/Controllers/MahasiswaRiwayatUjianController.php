<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Fluent;

class MahasiswaRiwayatUjianController extends Controller
{
    public function index()
    {
        $id_mahasiswa = Auth::user()->id_mahasiswa;

        $riwayat = DB::table('pendaftaran_toeic as pt')
            ->join('mahasiswa as m', 'pt.id_mahasiswa', '=', 'm.id_mahasiswa')
            ->where('pt.id_mahasiswa', $id_mahasiswa)
            ->select(
                'm.nim',
                'm.nama_mahasiswa',
                'pt.tipe_ujian',
                'pt.created_at as tanggal_pendaftaran'
            )
            ->orderBy('pt.created_at', 'desc')
            ->get();

    return view('mahasiswa.riwayat_ujian', [
        'activeMenu' => 'riwayat-ujian',
        'breadcrumb' => new \Illuminate\Support\Fluent([
            'title' => __('mahasiswa/riwayat_ujian.title'),
            'list'  => [__('mahasiswa/riwayat_ujian.breadcrumb')]
        ]),
        'title' => __('mahasiswa/riwayat_ujian.title'),
        'riwayat' => $riwayat
    ]);
    }



    public function getData()
    {
        $id_mahasiswa = Auth::user()->id_mahasiswa;

        $riwayat = DB::table('riwayat_ujian as ru')
            ->join('mahasiswa as m', 'ru.id_mahasiswa', '=', 'm.id_mahasiswa')
            ->leftJoin('pendaftaran_toeic as pt', 'pt.id_mahasiswa', '=', 'm.id_mahasiswa')
            ->where('ru.id_mahasiswa', $id_mahasiswa)
            ->select(
                'm.nim',
                'm.nama_mahasiswa',
                DB::raw("GROUP_CONCAT(DISTINCT pt.tipe_ujian ORDER BY pt.tipe_ujian SEPARATOR ' & ') as status_pendaftaran"),
                'ru.created_at'
            )
            ->groupBy('m.id_mahasiswa', 'm.nim', 'm.nama_mahasiswa', 'ru.created_at');

        return DataTables::of($riwayat)->addIndexColumn()->make(true);
    }
}

