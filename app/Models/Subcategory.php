<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'user_id',
        'image',
        'status',
    ];


    // relation with category model 
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id')->where('status', 0);
    }

    // relation with category model 
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'category_id')->where('status', 0);
    }
    // relation with product model 
    public function product()
    {
        return $this->hasMany(Product::class, 'subcategory_id')->where('status', 0);
    }
    // relation with product model 
    public function childCategory()
    {
        return $this->hasMany(SubSubCategory::class, 'subcategory_id')->where('status', 0);
    }
}
