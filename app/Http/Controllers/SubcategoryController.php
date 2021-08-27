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
        $deleted_subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.index', compact('categories','subcategorys','deleted_subcategories'));
    }
    function insert(SubcategoryPost $request){

        if(Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists())
        {
           return back()->with('subcategory_extis', 'Subcategory already exits');
        }
        else
        {
             //Insert SubCategory
         Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('success', 'SubCategory Added Succesfully');
        }
    }
    function delete($subcategory_id){
        Subcategory::find($subcategory_id)->delete();
        return back();
    }
    function restore($deletesubcategory_id){
        Subcategory::withTrashed()->find($deletesubcategory_id)->restore();
        return back();
    }
    function perdelete($deletesubcategory_id){
        Subcategory::withTrashed()->find($deletesubcategory_id)->forceDelete();
        return back()->with('delsuccess','SubCategory Delete Successfully');
    }
    function markdelete(Request $request){
        if($request->marked_id){
            foreach($request->marked_id as $single_markid){
                Subcategory::find($single_markid)->delete();
            }
        }

        return back();
    }
}
