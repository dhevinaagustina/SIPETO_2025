<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menentukan user yang sedang login dari semua guard
    private function getCurrentUser()
    {
        $guards = ['mahasiswa', 'dosen', 'admin', 'super_admin'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return [
                    'user' => Auth::guard($guard)->user(),
                    'guard' => $guard
                ];
            }
        }

        return null;
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $this->getCurrentUser();

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'User tidak terautentikasi'], 401);
        }

        $user = $data['user'];

        // Hapus foto lama jika ada
        if ($user->photo_path && Storage::exists($user->photo_path)) {
            Storage::delete($user->photo_path);
        }

        // Simpan foto baru
        $path = $request->file('photo')->store("public/profile-photos/{$data['guard']}");
        $publicPath = str_replace('public/', 'storage/', $path);

        // Simpan ke database
        $user->update([
            'photo_path' => $publicPath
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Foto profil berhasil diperbarui!',
            'photo_url' => asset($publicPath)
        ]);
    }

    public function getCurrentPhoto()
    {
        $data = $this->getCurrentUser();
        $defaultPhoto = asset('adminlte/dist/img/avatar2.png');

        if (!$data || !$data['user']) {
            return response()->json(['photo_url' => $defaultPhoto]);
        }

        $user = $data['user'];
        return response()->json([
            'photo_url' => $user->photo_path ? asset($user->photo_path) : $defaultPhoto
        ]);
    }

    public function removePhoto()
    {
        $data = $this->getCurrentUser();

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'User tidak ditemukan'], 404);
        }

        $user = $data['user'];

        if ($user->photo_path) {
            $path = str_replace('storage/', 'public/', $user->photo_path);

            if (Storage::exists($path)) {
                Storage::delete($path);
            }

            $user->update(['photo_path' => null]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Tidak ada foto untuk dihapus'], 404);
    }
}
