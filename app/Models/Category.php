<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'shop_as', //fast_deals , merchant
        'description',
        'image',
        'banner_status',
        'index_no',
        'status',
    ];

    // relation with exam model 
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class)->where('status', 0);
    }
    // relation with exam model 
    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0)->orderBy('id', 'desc');
    }
}
