<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {

        $model = \App\Models\About::orderBy('id','desc')->first();
        return view('about',[
            'about' => $model
        ]);
    }
}
