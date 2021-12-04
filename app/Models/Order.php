<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderId',
        'first_name',
        'last_name',
        'email',
        'phone',
        'discount',
        'subtotal',
        'tax',
        'total',
        'amount',
        'address',
        'payment_by',
        'divisions',
        'district',
        'upazila',
        'user_id',
        'product_id',
        'order_number',
        'transaction_id',
        'currency',
        'status',
        'notification',
        'customernotification',
        'quantity',
        'orderfor',
    ];
    protected function order_items()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }
}
