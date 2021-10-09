<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $users = User::where('id', '!=', $user_id)->orderBy('id', 'asc')->simplePaginate(3);
        $total_user = User::count();
        $logged_user_name = Auth::user()->name;
        return view('home', compact('users', 'total_user', 'logged_user_name'));
        return view('layouts.nav', compact('logged_user_name'));
    }

    function userinsert(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
}
