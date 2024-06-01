<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // Logic to fetch all chats or display a list of rooms
        return view('chat.index');
    }

    public function show($roomId)
    {
        // Logic to fetch messages for a specific room
        return view('chat.show', ['roomId' => $roomId]);
    }

    public function sendMessage(Request $request, $roomId)
    {
        // Logic to send a message to a specific room
        // Save message to database or broadcast to other users in the room
        return redirect()->route('chat.show', ['roomId' => $roomId]);
    }
}
