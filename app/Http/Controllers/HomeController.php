<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

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

        $order_by_users = Order::where('user_id', Auth::id())->get();
        return view('home', compact('users', 'total_user', 'logged_user_name', 'order_by_users'));
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

    function invoicedownload($order_id)
    {
        // echo $order_id;
        $data = Order::find($order_id);
        $pdf = PDF::loadView('admin.pdf.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

    function search()
    {
        $q = $_GET['q'];
        $search_result = Product::where('product_name', 'like', '%' . $q . '%')->get();
        return view('forntend.search', compact('search_result'));
    }
}
