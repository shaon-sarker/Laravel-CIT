<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_image', 'product_name', 'product_price', 'product_description', 'product_quantity', 'best_selling'];

    function relation_to_category_has_one()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
