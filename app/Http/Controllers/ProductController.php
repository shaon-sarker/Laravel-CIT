<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\ProductPost;
use App\Models\Product;
use App\Models\Productthumbail;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function view()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $products = Product::latest()->get();
        return view('admin.product.view', compact('categories', 'subcategories', 'products'));
    }
    function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index', compact('categories', 'subcategories'));
    }
    function insert(ProductPost $request)
    {
        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_quantity' => $request->product_quantity,
            'created_at' => Carbon::now(),
        ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id . '.' . $extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/' . $new_product_name));
        Product::find($product_id)->update([
            'product_image' => $new_product_name,
        ]);


        $start = 1;
        foreach ($request->file('product_thumbelimage') as $single_image) {
            $extension = $single_image->getClientOriginalExtension();
            $new_product_thumbel_name = $product_id . '--' . $start . '.' . $extension;
            Image::make($single_image)->save(base_path('public/uploads/products/thumbels/' . $new_product_thumbel_name));
            Productthumbail::insert([
                'product_id' => $product_id,
                'product_thumbelimage' => $new_product_thumbel_name,
                'created_at' => Carbon::now(),
            ]);
            // echo $new_product_thumbel_name;
            $start++;
        }
        return back()->with('success', 'product add succesfully');
    }


    function signleview($id)
    {
        $product_single_view = Product::find($id);
        return view('admin.product.single_view', compact('product_single_view'));
    }


    function edit($product_id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $product_edit = Product::find($product_id);
        return view('admin.product.edit_product', compact('product_edit', 'categories', 'subcategories'));
    }


    function update(Request $request)
    {
        $product_id = Product::find($request->product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_quantity' => $request->product_quantity,
        ]);
        $request->validate([
            'product_image' => 'image',
            'product_image' => 'file|size:600',

        ]);
        $new_product_photo = $request->product_image;
        $extension = $new_product_photo->getClientOriginalExtension();
        $new_product_name = $product_id . '.' . $extension;

        Image::make($new_product_photo)->save(base_path('public/uploads/products/' . $new_product_name));
        Product::find($product_id)->update([
            'product_image' => $new_product_name,
        ]);
        return back()->with('update', 'Update Successfully');
    }
    function delete($product_id)
    {
        $image = Product::find($product_id);
        $old_image = $image->product_image;
        $delete_path = public_path() . '/uploads/products/' . $old_image;
        unlink($delete_path);
        Product::find($product_id)->delete();
        return back()->with('delete', 'Product delete succesfully');
    }
}
