<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\LetsTalk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LetsTalkController extends Controller
{
    public function index()
    {
        return view('lets-talk');
    }

    public function submit(Request $request)
    {
        $request->validate([
            "first_name" => 'required',
            "last_name" => 'required',
            "personal_phone" =>'required',
            "personal_email" => 'required|email',
            "company" => 'required',
            "message" => 'required',
        ]);

        $model  = LetsTalk::create($request->all());
        $req = $request->except('g-recaptcha-response', '_token');
        $template =  'default';
        $mail = Mail::to(env('SITE_EMAIL'))->send(new SendMail($req, $template,'Let\'s talk Form'));
        if($model && $mail){
            return redirect()->back()->with(['success' => __('Form Submitted Successfully')]);
        }
        return redirect()->back()->with(['error' => __('Something happened, please try again or contact to site administrator!')]);

    }
}
