<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryPost;
use App\Models\Subcategory;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }
    function insert(CategoryPost $request){
        // //Validation Category
        // $request->validate([
        //     'category_name'=>'required',
        // ]);

        //Insert Category
        $category_id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
        $new_category_photo = $request->category_image;
        $extension = $new_category_photo->getClientOriginalExtension();
        $new_category_name = $category_id.'.'.$extension;

        Image::make($new_category_photo)->save(base_path('public/uploads/category/'.$new_category_name));
        Category::find($category_id)->update([
            'category_image'=>$new_category_name,
        ]);
        return back()->with('success', 'Category Added Succesfully');
    }

    function delete($category_id){
        Category::find($category_id)->delete();
        // Subcategory::where('category_id', $category_id)->forceDelete();
        Subcategory::where('category_id', $category_id)->update([
            'category_id'=>1,
        ]);
        // if(Subcategory::where('category_id', '!=', $category_id)){
        //     echo 'ok';
        // }
        // else{
        //     echo 'nai';
        // }
        // die();

        return back()->with('delsuccess', 'Category Delete Successfully');

    }
}
