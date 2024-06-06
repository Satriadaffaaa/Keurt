<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->oldest()->get(); // Change latest() to oldest()
        return view('contents.comment-page', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate(['message' => 'required']);

        Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return redirect()->back();
    }
}
