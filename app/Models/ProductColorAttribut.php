<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorAttribut extends Model
{
    use HasFactory;
    protected $fillable = [
        'color_row_id',
        'product_id',
    ];
}
