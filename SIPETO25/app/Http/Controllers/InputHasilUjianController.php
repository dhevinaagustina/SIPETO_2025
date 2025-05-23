<?php

namespace App\Http\Controllers;

use App\Models\HasilUjian;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class InputHasilUjianController extends Controller
{
    public function index()
    {
        $hasilUjian = HasilUjian::with('mahasiswa')->get();
        return view('hasil_ujian.index', compact('hasilUjian'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.createhasilujian', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'rekap_hasil_ujian' => 'required|string',
        ]);

        HasilUjian::create($request->all());

        return redirect()->route('hasil-ujian.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $hasilUjian = HasilUjian::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('hasil_ujian.edit', compact('hasilUjian', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'rekap_hasil_ujian' => 'required|string',
        ]);

        $hasilUjian = HasilUjian::findOrFail($id);
        $hasilUjian->update($request->all());

        return redirect()->route('hasil-ujian.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        $hasilUjian = HasilUjian::findOrFail($id);
        $hasilUjian->delete();

        return redirect()->route('hasil-ujian.index')->with('success', 'Data berhasil dihapus.');
    }
}

