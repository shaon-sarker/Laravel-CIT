<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;



class EditprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        // die();
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
    function userphotochange(Request $request){
        $request->validate([
            'profile_pic'=>'image',
            'profile_pic'=>'file|max:512',

        ]);
        if(Auth::user()->profile_pic != 'default.jpg'){
            $delete_path = public_path()."/uploads/users/".Auth::user()->profile_pic;
            unlink($delete_path);
        }

        $new_profile_photo = $request->profile_pic;
        $extension = $new_profile_photo->getClientOriginalExtension();
        $new_profile_name = Auth::id().'.'.$extension;

        Image::make($new_profile_photo)->save(base_path('public/uploads/users/'.$new_profile_name));
        User::find(Auth::id())->update([
            'profile_pic'=>$new_profile_name,
        ]);
        return back();
    }
}
