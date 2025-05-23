<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use App\Models\PendaftaranToeic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;

class PendaftaranToeicController extends Controller
{
    /**
     * Menampilkan form pendaftaran TOEIC Gratis.
     */
    public function create()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah sudah pernah daftar gratis
        $sudahDaftarGratis = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'gratis')
            ->exists();

        // Jika sudah daftar gratis, tampilkan halaman dengan tombol ke ITC
        return view('pendaftaran.form', [
            'activeMenu' => 'pendaftaran-toeic',
            'breadcrumb' => new Fluent([
                'title' => 'Pendaftaran TOEIC',
                'list'  => ['Dashboard', 'Pendaftaran TOEIC']
            ]),
            'kampusList' => Kampus::pluck('nama')->toArray(),
            'sudahDaftarGratis' => $sudahDaftarGratis,
        ]);
    }

    /**
     * Menyimpan data pendaftaran TOEIC Gratis.
     */
    public function store(Request $request)
    {
            $idMahasiswa = Auth::guard('mahasiswa')->id();

            if (!$idMahasiswa) {
                return redirect()->route('login')->with('error', 'Autentikasi mahasiswa gagal. Silakan login kembali.');
            }

            // Cek apakah sudah pernah daftar gratis
            $sudahDaftarGratis = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
                ->where('tipe_ujian', 'gratis')
                ->exists();

            if ($sudahDaftarGratis) {
                return redirect()->route('pendaftaran-toeic/mandiri.create')
                    ->with('error', 'Anda sudah pernah mendaftar ujian TOEIC gratis.');
            }

        // Validasi input
        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'nim'               => 'required|string|max:50',
            'jurusan'           => 'required|string|max:100',
            'prodi'             => 'required|string|max:100',
            'kampus'            => 'required|string|max:100',
            'kampus_lainnya'    => 'nullable|string|max:255',
            'nik'               => 'required|string|max:255',
            'no_wa'             => 'required|string|max:255',
            'alamat_asal'       => 'required|string|max:255',
            'alamat_sekarang'   => 'required|string|max:255',
            'scan_ktp'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'scan_ktm'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'pas_foto'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ]);

        // Proses penyimpanan file
        $ktpPath  = $request->file('scan_ktp')->store('uploads/ktp', 'public');
        $ktmPath  = $request->file('scan_ktm')->store('uploads/ktm', 'public');
        $fotoPath = $request->file('pas_foto')->store('uploads/foto', 'public');

        // Tentukan nama kampus yang disimpan
        $namaKampus = $validated['kampus'] === 'Lainnya' && !empty($validated['kampus_lainnya'])
            ? $validated['kampus_lainnya']
            : $validated['kampus'];

        // Simpan ke database
        PendaftaranToeic::create([
            'id_mahasiswa'      => $idMahasiswa,
            'tipe_ujian'        => 'gratis', // langsung ditentukan di sini
            'nama'              => $validated['nama'],
            'nim'               => $validated['nim'],
            'jurusan'           => $validated['jurusan'],
            'prodi'             => $validated['prodi'],
            'kampus'            => $namaKampus,
            'nik'               => $validated['nik'],
            'no_wa'             => $validated['no_wa'],
            'alamat_asal'       => $validated['alamat_asal'],
            'alamat_sekarang'   => $validated['alamat_sekarang'],
            'scan_ktp'          => $ktpPath,
            'scan_ktm'          => $ktmPath,
            'pas_foto'          => $fotoPath,
            'tanggal_daftar'    => now(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran TOEIC gratis berhasil!');
    }

    public function createMandiri()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $sudahDaftarMandiri = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'mandiri')
            ->exists();

        return view('pendaftaran.form_mandiri', [
            'activeMenu' => 'pendaftaran-toeic/mandiri',
            'breadcrumb' => new \Illuminate\Support\Fluent([
                'title' => 'Pendaftaran TOEIC Mandiri',
                'list'  => ['Dashboard', 'Pendaftaran TOEIC Mandiri']
            ]),
            'sudahDaftarMandiri' => $sudahDaftarMandiri,
            'urlItc' => 'https://itc-indonesia.com/contact-us-2/', 
        ]);
    }

    public function storeMandiri()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Autentikasi mahasiswa gagal. Silakan login kembali.');
        }

        // Cek apakah sudah pernah daftar mandiri
        $sudahDaftarMandiri = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'mandiri')
            ->exists();

        if (!$sudahDaftarMandiri) {
            $mahasiswa = Auth::guard('mahasiswa')->user();

            PendaftaranToeic::create([
                'id_mahasiswa'      => $idMahasiswa,
                'tipe_ujian'        => 'mandiri',
                'nama'              => $mahasiswa->nama ?? '-',
                'nim'               => $mahasiswa->nim ?? '-',
                'jurusan'           => $mahasiswa->jurusan ?? '-',
                'prodi'             => $mahasiswa->prodi ?? '-',
                'kampus'            => $mahasiswa->kampus ?? '-',
                'nik'               => $mahasiswa->nik ?? '-',
                'no_wa'             => $mahasiswa->no_wa ?? '-',
                'alamat_asal'       => $mahasiswa->alamat_asal ?? '-',
                'alamat_sekarang'   => $mahasiswa->alamat_sekarang ?? '-',
                'scan_ktp'          => '-',
                'scan_ktm'          => '-',
                'pas_foto'          => '-',
                'tanggal_daftar'    => now(),
            ]);
        }

        return redirect()->away('https://itc-indonesia.com/contact-us-2/');
    }




}
