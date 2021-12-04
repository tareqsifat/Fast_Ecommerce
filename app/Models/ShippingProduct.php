<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingProduct extends Model
{
    use HasFactory;
    protected $filable = [
        'title',
        'slug',
        'product_code',
        'category_id',
        'subcategory_id',
        'user_id',
        'brand_id',
        'thumbnail',
        'mostview',
        'description',
        'description2',
        'availability',
        'quantity',
        'price',
        'sale_price',
        'status',
    ];
}
