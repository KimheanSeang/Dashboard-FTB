<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PushController extends Controller
{
    public function Telegram()
    {
        return view('backend.push.telegram');
    }
    public  function Skype()
    {
        return view('backend.push.skype');
    }
}
