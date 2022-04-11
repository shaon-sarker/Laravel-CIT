<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function Bangla()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'bangla');
        return redirect()->back();
    }

    public function English()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}
