<?php

namespace App\Http\Controllers;

use App\Models\PrivacePolicy;
use Illuminate\Http\Request;

class PrivacePolicyController extends Controller
{
    public function index()
    {
        $model = PrivacePolicy::orderBy('id','desc')->first();
        return view('policy',[
            'policy' => $model
        ]);
    }
}
