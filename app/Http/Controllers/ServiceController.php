<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {

        $model  = Service::orderBy('sorting')->get();

        return view('services',
        [
            'services' => $model

        ]);
    }
}
