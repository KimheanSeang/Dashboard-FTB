<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function AllChatBot()
    {
        return view('backend.chatbot.all_chatbot');
    }
}