<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'product_id',
        'user_id',
    ];
    public function ProductSpecificationOptions()
    {
        return $this->hasMany(ProductSpecificationOptions::class);
    }
}
