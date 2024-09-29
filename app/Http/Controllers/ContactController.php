<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $model  =  Contact::orderBy('id', 'desc')->first();
        return view('contact',['contact' => $model]);
    }
}
