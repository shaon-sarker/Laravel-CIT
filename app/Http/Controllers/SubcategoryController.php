<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use App\Http\Requests\SubcategoryPost;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $categories = Category::all();
        $subcategorys = Subcategory::latest()->get();
        $deleted_subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.index', compact('categories', 'subcategorys', 'deleted_subcategories'));
    }
    function insert(SubcategoryPost $request)
    {

        if (Subcategory::withTrashed()->where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()) {
            return back()->with('subcategory_extis', 'Subcategory already exits');
        } else {
            //Insert SubCategory
            Subcategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'SubCategory Added Succesfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }
    function delete($subcategory_id)
    {
        Subcategory::find($subcategory_id)->delete();

        $notification = array(
            'message' => 'SubCategory delete Succesfully',
            'alert-type' => 'warning'
        );
        return back()->with($notification);
        // return back();
    }
    function restore($deletesubcategory_id)
    {
        Subcategory::withTrashed()->find($deletesubcategory_id)->restore();

        $notification = array(
            'message' => 'SubCategory Undo Succesfully',
            'alert-type' => 'info'
        );
        return back()->with($notification);
        // return back();
    }
    function perdelete($deletesubcategory_id)
    {
        Subcategory::withTrashed()->find($deletesubcategory_id)->forceDelete();
        $notification = array(
            'message' => 'SubCategory Permanent delete Succesfully',
            'alert-type' => 'warning'
        );
        return back()->with($notification);
        // return back()->with('delsuccess', 'SubCategory Delete Successfully');
    }
    function markdelete(Request $request)
    {
        if ($request->marked_id) {
            foreach ($request->marked_id as $single_markid) {
                Subcategory::find($single_markid)->delete();
            }
        }

        return back();
    }
    function edit($subcategory_id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::find($subcategory_id);
        return view('admin.subcategory.edit', compact('subcategories', 'categories'));
    }
    // function update(Request $request){
    //     print_r($request->all());
    // }
    function update(Request $request)
    {
        Subcategory::find($request->subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,

        ]);

        $notification = array(
            'message' => 'SubCategory Update Succesfully',
            'alert-type' => 'info'
        );
        return back()->with($notification);

        // return back()->with('update', 'update succesfully');
    }
}
