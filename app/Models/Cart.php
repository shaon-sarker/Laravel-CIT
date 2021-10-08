<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['cart_amount'];

    function relation_to_product_has_one()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
