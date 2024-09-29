<?php

namespace App\Http\Controllers;

use App\Models\Home;

class HomeController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $home = Home::orderBy('id', 'desc')->first();
        return view('home',[
            'home' => $home
        ]);
    }

}
