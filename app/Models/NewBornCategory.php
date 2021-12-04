<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBornCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'user_id',
        'user_id',
        'baby_category_id',
        'image',
        'shop_as',
        'status',
    ];


    public function babyCategory()
    {
        return $this->belongsTo(BabyCategory::class)->where('status', 0);
    }
    public function beforeBornCategory()
    {
        return $this->hasMany(beforeBornCategory::class)->where('status', 0);
    }
    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0);
    }
}
