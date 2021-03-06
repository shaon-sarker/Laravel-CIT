<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Mail\SendMail;
use Session;


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
        // if (Session::get('lastpage') == $_GET['lastpage']) {
        //     return redirect('checkout');
        // } else
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
        $order_by = $_GET['order_by'];
        if ($order_by == 1) {
            $search_result = Product::where('product_name', 'like', '%' . $q . '%')->orderBy('product_name', 'asc')->get();
        } else {
            $search_result = Product::where('product_name', 'like', '%' . $q . '%')->orderBy('product_name', 'desc')->get();
        }

        return view('forntend.search', compact('search_result'));
    }


    function invoicesend($order_id)
    {
        // echo $order_id;
        // die();
        $shaon = Order::where('id', $order_id)->get();
        Mail::to(Auth::user()->email)->send(new SendMail($shaon));
        return redirect()->back();
    }

    function Smssend($order_id)
    {
        $order_details = Order::find($order_id);
        $order_id = $order_details->id;
        $order_subtotal = $order_details->sub_total;
        $order_phoneno = $order_details->phone;
        $url = "http://66.45.237.70/api.php";
        $number = $order_phoneno;
        $text = "Your Order ID:" . $order_id . ' ' . 'Total Payment: ' . $order_subtotal;
        $data = array(
            'username' => "shaon54",
            'password' => "NZXWRD97",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
        if ($sendstatus == 1101) {
            echo 'Message Sent Successfully';
        }
    }
}
