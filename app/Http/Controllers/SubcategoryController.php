<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use App\Http\Requests\SubcategoryPost;


class SubcategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        $subcategorys = Subcategory::latest()->get();
        return view('admin.subcategory.index', compact('categories','subcategorys'));
    }
    function insert(SubcategoryPost $request){
         //Insert SubCategory
         Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success', 'SubCategory Added Succesfully');
    }
}
