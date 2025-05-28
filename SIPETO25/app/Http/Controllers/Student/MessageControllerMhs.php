<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageControllerMhs extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        abort_unless($mahasiswa, 403, 'Anda bukan mahasiswa');

        $messages = Message::where('mahasiswa_id', $mahasiswa->id_mahasiswa)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.messages.index', compact('messages'));
    }

    public function markAsRead(Message $message)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        abort_if($message->mahasiswa_id !== $mahasiswa->id_mahasiswa, 403);

        $message->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }
}