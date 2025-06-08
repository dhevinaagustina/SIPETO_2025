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
    // Menampilkan form pendaftaran TOEIC Gratis
    public function create()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $sudahDaftarGratis = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'gratis')
            ->exists();

        // Ambil data pendaftaran jika sudah mendaftar
        $pendaftaran = null;
        if ($sudahDaftarGratis) {
            $pendaftaran = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
                ->where('tipe_ujian', 'gratis')
                ->first();
        }

        return view('pendaftaran.form', [
            'activeMenu' => 'pendaftaran-toeic',
            'breadcrumb' => new Fluent([
                'title' => 'Pendaftaran TOEIC Gratis',
                'list'  => ['Daftar Ujian', 'Gratis']
            ]),
            'kampusList' => Kampus::pluck('nama')->toArray(),
            'sudahDaftarGratis' => $sudahDaftarGratis,
            'pendaftaran' => $pendaftaran
        ]);
    }

    // Menyimpan data pendaftaran TOEIC Gratis
    public function store(Request $request)
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();

        if (!$idMahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $sudahDaftarGratis = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'gratis')
            ->exists();

        if ($sudahDaftarGratis) {
            return redirect()->back()->with('error', 'Anda sudah pernah mendaftar TOEIC gratis.');
        }

        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'nim'               => ['required', 'regex:/^[0-9]+$/', 'min:8', 'max:20'],
            'jurusan'           => 'required|string|max:100',
            'prodi'             => 'required|string|max:100',
            'kampus'            => 'required|string|max:100',
            'nik'               => ['required', 'regex:/^[0-9]+$/', 'min:8', 'max:25'],
            'no_wa'             => ['required', 'regex:/^[0-9]+$/', 'min:10', 'max:20'],
            'alamat_asal'       => 'required|string|max:255',
            'alamat_sekarang'   => 'required|string|max:255',
            'scan_ktp'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:102400',
            'scan_ktm'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:102400',
            'pas_foto'          => 'required|file|mimes:jpg,jpeg,png,pdf|max:102400',
        ]);


        try {
            $ktpPath = $request->file('scan_ktp')->store('uploads/ktp', 'public');
            $ktmPath = $request->file('scan_ktm')->store('uploads/ktm', 'public');
            $fotoPath = $request->file('pas_foto')->store('uploads/foto', 'public');

            PendaftaranToeic::create([
                'id_mahasiswa'      => $idMahasiswa,
                'tipe_ujian'        => 'gratis',
                'nama'              => $validated['nama'],
                'nim'               => $validated['nim'],
                'jurusan'           => $validated['jurusan'],
                'prodi'             => $validated['prodi'],
                'kampus'            => $validated['kampus'],
                'nik'               => $validated['nik'],
                'no_wa'             => $validated['no_wa'],
                'alamat_asal'       => $validated['alamat_asal'],
                'alamat_sekarang'   => $validated['alamat_sekarang'],
                'scan_ktp'          => $ktpPath,
                'scan_ktm'          => $ktmPath,
                'pas_foto'          => $fotoPath,
                'tanggal_daftar'    => now(),
            ]);

            return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran TOEIC gratis berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Cek status pendaftaran via AJAX
    public function cekGratis()
    {
        $idMahasiswa = Auth::guard('mahasiswa')->id();
        $sudahDaftarGratis = PendaftaranToeic::where('id_mahasiswa', $idMahasiswa)
            ->where('tipe_ujian', 'gratis')
            ->exists();

        return response()->json(['sudah_mendaftar' => $sudahDaftarGratis]);
    }

    // Form TOEIC Mandiri
    public function createMandiri()
    {
        $akun = $this->getUser();
        $guard = $this->getUserGuard();

        if (!$akun || !$guard) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $idField = 'id_' . $guard;
        $idValue = $akun->id;

        $jumlahPendaftaranMandiri = PendaftaranToeic::where($idField, $idValue)
            ->where('tipe_ujian', 'mandiri')
            ->count();

        return view('pendaftaran.form_mandiri', [
            'activeMenu' => 'pendaftaran-toeic/mandiri',
            'breadcrumb' => new \Illuminate\Support\Fluent([
                'title' => 'Pendaftaran TOEIC Mandiri',
                'list'  => ['Daftar Ujian', 'Mandiri']
            ]),
            'jumlahPendaftaranMandiri' => $jumlahPendaftaranMandiri,
            'urlItc' => 'https://itc-indonesia.com/contact-us-2/',
        ]);
    }


    // Simpan TOEIC Mandiri
    public function storeMandiri(Request $request)
    {
        $akun = $this->getUser();
        $guard = $this->getUserGuard();

        if (!$akun || !$guard) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $idField = 'id_' . $guard;
        $idValue = $akun->id;

        $sudahDaftar = PendaftaranToeic::where($idField, $idValue)
            ->where('tipe_ujian', 'mandiri')
            ->exists();

        if (!$sudahDaftar) {
            PendaftaranToeic::create([
                $idField             => $idValue,
                'tipe_ujian'         => 'mandiri',
                'nama'               => $akun->nama ?? '-',
                'nim'                => $akun->nim ?? '-',
                'jurusan'            => $akun->jurusan ?? '-',
                'prodi'              => $akun->prodi ?? '-',
                'kampus'             => $akun->kampus ?? '-',
                'nik'                => $akun->nik ?? '-',
                'no_wa'              => $akun->no_wa ?? '-',
                'alamat_asal'        => $akun->alamat_asal ?? '-',
                'alamat_sekarang'    => $akun->alamat_sekarang ?? '-',
                'scan_ktp'           => '-',
                'scan_ktm'           => '-',
                'pas_foto'           => '-',
                'tanggal_daftar'     => now(),
            ]);
        }

        return redirect()->away('https://itc-indonesia.com/contact-us-2/');
    }


}