<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'price',
        'quantity',
        'product_by_shopid',
        'shop_for', //fast_deals or merchant
        'payment_status',
        'notification',
        'status',
    ];

    // relation with product model 
    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 0);
    }
    // relation with product model 
    public function order()
    {
        return $this->belongsTo(Order::class,);
    }
    // relation with product model 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // relation with product model 
    public function shop()
    {
        return $this->belongsTo(User::class, 'product_by_shopid');
    }
}
