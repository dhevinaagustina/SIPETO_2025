<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user()->mahasiswa; // Ganti Auth::user()->student
        $messages = Message::where('mahasiswa_id', $mahasiswa->id_mahasiswa) // Ganti student_id
            ->orderBy('created_at', 'desc')
            ->get();
        return view('student.messages.index', compact('messages'));
    }

    public function markAsRead(Message $message)
    {
        if ($message->student_id !== Auth::user()->student->id) {
            abort(403);
        }

        $message->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}