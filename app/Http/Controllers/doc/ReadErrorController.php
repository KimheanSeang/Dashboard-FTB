<?php

namespace App\Http\Controllers\doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReadErrorController extends Controller
{
    public function AllRead()
    {
        return view('backend.read.all_read');
    }
}