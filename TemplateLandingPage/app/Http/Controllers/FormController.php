<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function sendContact(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Di sini kamu bisa kirim email, simpan ke DB, dll
        return response()->json(['success' => 'Pesan berhasil dikirim!']);
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // Simpan email atau kirim notifikasi, dll
        return response()->json(['success' => 'Terima kasih sudah berlangganan!']);
    }
}
