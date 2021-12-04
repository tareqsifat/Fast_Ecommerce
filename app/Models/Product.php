<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'product_code',
        'slug',
        'product_for', //campaign, fast_deals, shipping
        'shipping',
        'impacode',
        'shop_for', //Merchant  //Fast deals
        'category_id',
        'subcategory_id',
        'sub_sub_category_id',
        'baby_category_id',
        'new_born_category_id',
        'before_born_category_id',
        'user_id',
        'brand_id',
        'thumbnail',
        'mostview',
        'description',
        'color',
        'sold',
        'description2',
        'availability',
        'quantity',
        'price',
        'sale_price',
        'offer_time',
        'status',
    ];

    // relation with category model 
    public function productspecification()
    {
        return $this->hasMany(ProductSpecification::class);
    }
    // relation with category model 
    public function productimages()
    {
        return $this->hasMany(Productimage::class);
    }

    // relation with category model 
    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id')->where('status', 0);
    }
    // relation with category model 
    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'category_id')->where('status', 0);
    }
    // relation with category model 
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->where('status', 0);
    }
    // relation with category model 
    public function childCategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id')->where('status', 0);
    }
    // relation with category model 
    public function babycategory()
    {
        return $this->belongsTo(BabyCategory::class, 'baby_category_id')->where('status', 0);
    }
    // relation with new boren category model 
    public function newBornCategory()
    {
        return $this->belongsTo(NewBornCategory::class, 'new_born_category_id')->where('status', 0);
    }
    // relation with new before born category model 
    public function beforeBornCategory()
    {
        return $this->belongsTo(BeforeBornCategory::class, 'before_born_category_id')->where('status', 0);
    }
    // relation with category model 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // relation with category model 
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
