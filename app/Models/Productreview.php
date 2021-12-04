<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productreview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'review',
        'image',
        'like',
        'comment',
        'status',
        'notification',
    ];
    public function user()
    {
        return $this->belongsTo(Customers::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function reviewImage()
    {
        return $this->hasMany(ReviewImage::class, 'productreview_id');
    }
}
