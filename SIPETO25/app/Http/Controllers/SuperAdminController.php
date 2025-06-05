<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('superadmin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('superadmin.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:admin_upa,username',
            'nama_admin' => 'required',
            'nip' => 'required|unique:admin_upa,nip',
            'email' => 'required|email|unique:admin_upa,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'username' => $request->username,
            'nama_admin' => $request->nama_admin,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.kelola_admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('superadmin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|unique:admin_upa,username,' . $id . ',id_admin',
            'nama_admin' => 'required',
            'nip' => 'required|unique:admin_upa,nip,' . $id . ',id_admin',
            'email' => 'required|email|unique:admin_upa,email,' . $id . ',id_admin',
            'password' => 'nullable|min:6',
        ]);

        $admin->update([
            'username' => $request->username,
            'nama_admin' => $request->nama_admin,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.kelola_admin')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Admin berhasil dihapus.');
    }


}
