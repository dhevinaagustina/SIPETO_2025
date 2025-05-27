<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Message;
use App\Notifications\StudentResultNotification;

class MessageController extends Controller
{
    public function create()
    {
        $mahasiswas = Mahasiswa::orderBy('nama_mahasiswa')->get();
        return view('admin.messages.create', compact('mahasiswas'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'students' => 'required|array',
            'students.*.nim' => 'required|exists:mahasiswa,nim',
            'students.*.status' => 'required|in:success,fail',
            'message' => 'required|string'
        ]);

        foreach ($request->students as $studentData) {
            $mahasiswa = Mahasiswa::where('nim', $studentData['nim'])->first();
            
            $message = Message::create([
                'mahasiswa_id' => $mahasiswa->id_mahasiswa,
                'admin_id' => auth()->id(),
                'status' => $studentData['status'],
                'message' => $request->message,
                'is_read' => false
            ]);
            
            $mahasiswa->notify(new StudentResultNotification($message));
        }

        return redirect()->back()->with('success', 'Pesan terkirim!');
    }
}