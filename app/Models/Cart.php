<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->where('status', 0);
    }
}
