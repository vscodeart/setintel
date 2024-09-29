<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetsTalkController extends Controller
{
    public function index()
    {
        return view('lets-talk');
    }
}
