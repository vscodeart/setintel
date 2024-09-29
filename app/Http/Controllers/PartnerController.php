<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $model = Partner::orderBy('created_at','desc')->get();
        return view('partners',[
           'partners' => $model
        ]);
    }
}
