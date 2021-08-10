<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index(){
        return view('admin.category.index');
    }
    function insert(Request $request){

        Category::insert([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success', 'Category Added Succesfully');
    }
}
