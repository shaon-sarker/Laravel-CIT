<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_description'=>'required',
            'product_quantity'=>'required',
            'product_image'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>'Select Category id',
            'subcategory_id.required'=>'Select SubCategory id',
            'product_name.required'=>'Select Product name',
            'product_price.required'=>'Select Product price',
            'product_description.required'=>'Select Product Description',
            'product_quantity.required'=>'Select Product Quantity',
            'product_image.required'=>'Select product image',
        ];
    }
}
