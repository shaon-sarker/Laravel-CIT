<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\ProductPost;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    function view(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::all();
        return view('admin.product.view', compact('categories','subcategories','products'));
    }
    function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index', compact('categories','subcategories'));
    }
    function insert(ProductPost $request){
        $product_id = Product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_description'=>$request->product_description,
            'product_quantity'=>$request->product_quantity,
            'created_at'=>Carbon::now(),
        ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id.'.'.$extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/'.$new_product_name));
        Product::find($product_id)->update([
            'product_image'=>$new_product_name,
        ]);
        return back()->with('success', 'product add succesfully');
    }
    function signleview($id){
      $product_single_view = Product::find($id);
      return view('admin.product.single_view', compact('product_single_view'));
    }
    function edit($product_id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $product_edit = Product::find($product_id);
        return view('admin.product.edit_product', compact('product_edit','categories','subcategories'));
    }
    function update(Request $request){
        $product_id= Product::find($request->product_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_description'=>$request->product_description,
            'product_quantity'=>$request->product_quantity,
        ]);
        $request->validate([
            'product_image'=>'image',
            'product_image'=>'file|max:512',

        ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id.'.'.$extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/'.$new_product_name));
        Product::find($product_id)->update([
            'product_image'=>$new_product_name,
        ]);
        return back()->with('update', 'Update Successfully');

    }
    function delete($product_id){
        Product::find($product_id)->delete();
        // $image = Product::find($product_id);
        // $old_image = $image->product_image;
        // unlink($old_image);
        return back()->with('delete', 'Product delete succesfully');
    }
}
