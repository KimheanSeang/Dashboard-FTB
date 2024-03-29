<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PushController extends Controller
{

    public  function Skype()
    {
        return view('backend.push.skype');
    }
    public function Message()
    {
        return view('backend.push.message');
    }
}
