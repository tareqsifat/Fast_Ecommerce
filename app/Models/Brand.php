<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand_logo',
        'description',
        'shop_as', //merchant or admin
        'user_id',
        'status',
    ];


    public function product()
    {
        return $this->hasMany(Product::class)->where('status', 0);
    }
}
