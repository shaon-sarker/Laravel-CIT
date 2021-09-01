<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;



class EditprofileController extends Controller
{
    function index(){
        return view('admin.edit');
    }
    function profilechange(Request $request){
        $user_id = Auth::id();
        User::find($user_id)->update([
            'name'=>$request->name,
        ]);
        return back()->with('success', 'Update Name Succes');
    }

    function passwordchange(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required',
            'password'=>'confirmed',
            'password'=>Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols(),
        ]);

        die();
        if(Hash::check($request->old_password,Auth::user()->password)){
            $user_id = Auth::id();
            User::find($user_id)->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('passsuccess', 'Update Password Succesfully');
        }
        else{
            return back('wrongpass', 'Old password is wrong');
        }
    }
}
