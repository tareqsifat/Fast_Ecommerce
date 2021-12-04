<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeforeBornCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'user_id',
        'new_born_category_id',
        'image',
        'shop_as',
        'status',
    ];


    public function newBornCategory()
    {
        return $this->belongsTo(NewBornCategory::class)->where('status', 0);
    }
    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0);
    }
}
