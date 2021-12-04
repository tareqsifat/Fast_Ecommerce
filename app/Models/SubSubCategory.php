<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'subcategory_id',
        'user_id',
        'image',
        'shop_as',
        'status',
    ];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class)->where('status', 0);
    }
    public function babycategory()
    {
        return $this->hasMany(BabyCategory::class, 'sub_sub_category_id')->where('status', 0);
    }
    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0);
    }
}
