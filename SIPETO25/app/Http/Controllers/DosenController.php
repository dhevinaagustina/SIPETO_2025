<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        // Gunakan paginate, misalnya 10 per halaman, dan urutkan terbaru dulu
        $dosen = Dosen::orderBy('created_at', 'desc')->paginate(10);

        return view('superadmin.dosen.index', compact('dosen'));
    }


    public function create()
    {
        return view('superadmin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'nip' => 'required|unique:dosen,nip',
            'email' => 'required|email|unique:dosen,email',
            'username' => 'required|unique:dosen,username',
            'password' => 'required|min:6',
        ]);

        Dosen::create([
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('superadmin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nama_dosen' => 'required',
            'nip' => 'required|unique:dosen,nip,' . $id . ',id_dosen',
            'email' => 'required|email|unique:dosen,email,' . $id . ',id_dosen',
            'username' => 'required|unique:dosen,username,' . $id . ',id_dosen',
        ]);

        $dosen->update([
            'nama_dosen' => $request->nama_dosen,
            'nip' => $request->nip,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $dosen->password,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus');
    }

}
