<?php

namespace App\Http\Livewire\Front;

use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Filter extends Component
{
    public $slug;
    public $category_id;
    public $short_by = 'asc';
    public $orderBy = 'price';
    public $instock;
    public $OutOfstock;
    public $min_price = 0;
    public $max_price;
    public $product;
    public $type;
    public $countby = 12;
    public function mount($slug)
    {
        $this->slug = $slug;
        $cateData = DB::table(session('search_by'))->where('slug', $slug)->first();
        if ($cateData) {
            $this->category_id = $cateData->id;
            $maxData = Product::where('subcategory_id', $cateData->id)->orderBy('price', 'desc')->first();
            $this->max_price = ($maxData->sale_price) ? $maxData->sale_price : $maxData->price;
            session(['old_max_price' => $this->max_price]);
        } else {
            return abort(404);
        }
        $this->min_price = (session('min_price') ? session('min_price') : $this->min_price);
        $this->max_price = (session('max_price') ? session('max_price') : $this->max_price);

        $this->instock = (session('instock') ? session('instock') : $this->instock);
        $this->short_by = (session('short_by') ? session('short_by') : $this->short_by);
        $this->countby = (session('countby') ? session('countby') : $this->countby);
        $this->type = (session('type') ? session('type') : $this->type);
    }

    public function render()
    {
        $cateData = DB::table(session('search_by'))->where('slug', $this->slug)->first();

        if ($cateData) {
            $uniquebrads = Product::where('subcategory_id',  $cateData->id)->distinct('brand_id')->pluck('brand_id'); //take unique brand 
            if (session('instock') !== null) {
                $fProduct = Product::where('subcategory_id', $cateData->id)->where('availability', session('instock'))->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->short_by)->paginate($this->countby);
            } else {
                $fProduct = Product::where('subcategory_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->short_by)->paginate($this->countby);
            }
            // $fProduct = Product::where('subcategory_id', $cateData->id)->whereBetween('price', [$this->min_price, $this->max_price])->orderBy($this->orderBy, $this->short_by)->paginate($this->countby);
            return view('livewire.front.filter', [
                'cateData' => $cateData,
                'fProduct' => $fProduct,
                'uniquebrads' => $uniquebrads,
            ])->layout('layouts.web');
        } else {
            return abort(404);
        }
    }
}
