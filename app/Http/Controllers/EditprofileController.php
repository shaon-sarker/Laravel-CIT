<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditprofileController extends Controller
{
    function index(){
        $logged_user_name = Auth::user()->name;
        $logged_user_email = Auth::user()->email;
        $logged_user_password = Auth::user()->password;
        $logged_user_create = Auth::user()->created_at;
        return view('admin.edit', compact('logged_user_name','logged_user_email','logged_user_password','logged_user_create'));
    }
}
