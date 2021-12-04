<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'user_id',
        'user_id',
        'sub_sub_category_id',
        'image',
        'shop_as',
        'status',
    ];


    public function SubSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class)->where('status', 0);
    }

    public function newBornCategory()
    {
        return $this->hasMany(NewBornCategory::class, 'baby_category_id')->where('status', 0);
    }
    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0);
    }
}
