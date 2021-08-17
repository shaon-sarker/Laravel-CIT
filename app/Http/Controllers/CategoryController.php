<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    function insert(Request $request){
        //Validation Category
        $request->validate([
            'category_name'=>'required',
        ]);

        //Insert Category
        Category::insert([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success', 'Category Added Succesfully');
    }

    function delete($category_id){
        Category::find($category_id)->delete();
        return back()->with('delsuccess', 'Category Delete Successfully');

    }
}
