<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->paginate(10);
        return view('superadmin.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'username' => 'required|unique:mahasiswa,username',
            'email' => 'nullable|email',
            'password' => 'required|min:6',
            'jurusan' => 'required|string',
            'prodi' => 'required|string',
            'kampus' => 'required|string',
        ]);


        Mahasiswa::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'username' => $request->username,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'kampus' => $request->kampus,
            'password' => Hash::make($request->password),
            'status' => 'aktif', // default saat create
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id_mahasiswa', $id)->firstOrFail();

        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $id . ',id_mahasiswa',
            'nama_mahasiswa' => 'required',
            'username' => 'required|unique:mahasiswa,username,' . $id . ',id_mahasiswa',
            'email' => 'nullable|email',
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'username' => $request->username,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'kampus' => $request->kampus,
            'password' => $request->password ? Hash::make($request->password) : $mahasiswa->password,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa diperbarui');
    }

    public function destroy($id)
    {
        Mahasiswa::where('id_mahasiswa', $id)->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa dihapus');
    }
}
