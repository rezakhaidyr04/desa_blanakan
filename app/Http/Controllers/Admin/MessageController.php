<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::latest();
        
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $messages = $query->paginate(15);
        $unreadCount = Message::unread()->count();
        
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(Message $message)
    {
        if ($message->status === 'unread') {
            $message->markAsRead();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required|min:10',
        ]);

        $message->markAsReplied($request->reply);

        // Di sini bisa ditambahkan pengiriman email balasan
        // Mail::to($message->email)->send(new ReplyMessage($message));

        return redirect()->route('admin.messages.show', $message)
            ->with('success', 'Balasan berhasil dikirim!');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}
