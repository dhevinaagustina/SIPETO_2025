<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function editPhoto()
    {
        return view('profile.edit-photo');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::guard('mahasiswa')->check() 
            ? Auth::guard('mahasiswa')->user() 
            : Auth::guard('dosen')->user();

        // Delete old photo if exists
        if ($user->photo_path && Storage::exists($user->photo_path)) {
            Storage::delete($user->photo_path);
        }

        // Store new photo
        $path = $request->file('photo')->store('profile-photos');

        // Update user record
        $user->update(['photo_path' => $path]);

        return response()->json([
            'success' => true,
            'message' => 'Foto profil berhasil diperbarui!',
            'photo_url' => Storage::url($path)
        ]);
    }
}