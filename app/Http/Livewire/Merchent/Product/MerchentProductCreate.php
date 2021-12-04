<?php

namespace App\Http\Livewire\Merchent\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\ProductSpecification;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;

class MerchentProductCreate extends Component
{

    use WithFileUploads;
    protected $listeners = ['refreshParent' => '$refresh'];
    public $title;
    public $slug;
    public $categorys_id;
    public $subcategory_id;
    public $child_category;
    public $brand_id;
    public $thumbnail;
    public $image = [];
    public $mostview;
    public $description;
    public $shortdescription;
    public $availability = 1;
    public $quantity = 1;
    public $price;
    public $sale_price;
    public $offer_time;
    public $iteration;
    public $product_for = 'fast_deals';
    public $color;
    public $sold;


    // save ation method 
    public function save()
    {
        $lastrow = Product::orderBy('id', 'desc')->first();
        $product_code = '#' . rand(100000, 999999999) . $lastrow->id;
        $this->validate([
            'title' => 'required',
            'slug'  => 'required|unique:products,slug|max:60',
            'subcategory_id' => 'required|int',
            'categorys_id' => 'required|int',
            'child_category' => 'required',
            'brand_id'  => 'required|int',
            'quantity' => 'required',
            'price' => 'required',
            'thumbnail' => 'required|image|max:512|dimensions:width=500,height=500',
        ], [
            'thumbnail.dimensions' => 'Thumbnai dimensions height and width will be equal Example:500px X 500px',
        ]);

        $thumbfileName = $this->thumbnail->getClientOriginalName();
        $thumbWithoutExt = pathinfo($thumbfileName, PATHINFO_FILENAME);
        $thumbextension = pathinfo($thumbfileName, PATHINFO_EXTENSION);
        $thumbName = $thumbWithoutExt . rand(10, 99) . '.' . $thumbextension;
        $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
        Image::make($this->thumbnail)->save("uploads/products/thumbnails/$originalThumbName");
        $data = Product::create([
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'product_code' => $product_code,
            'description' => $this->description,
            'description2' => $this->shortdescription,
            'category_id' => $this->categorys_id,
            'subcategory_id' => $this->subcategory_id,
            'sub_sub_category_id' => $this->child_category,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'user_id' => Auth::user()->id,
            'sale_price' => $this->sale_price,
            'availability' => $this->availability,
            'product_for' => $this->product_for,
            'shop_for' => 'Merchant',
            'offer_time' => $this->offer_time,
            'offer_time' => $this->offer_time,
            'color' => $this->color,
            'sold' => $this->sold,
        ]);

        if (!is_null($this->image)) {
            $this->validate([
                'image.*' => 'image',
            ]);
            $i = 1;
            foreach ($this->image as $key => $image) {
                $imagesfileName = $image->getClientOriginalName();
                $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
                $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
                $imagesName = $filename . $i . '.' . $extension;
                $originalimagesName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                $this->image[$key] = Image::make($this->image[$key])->save("uploads/products/images/$originalimagesName");
                Productimage::create([
                    'product_id' => $data->id,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
        };
        $specification = ProductSpecification::where('product_id', NULL)->where('user_id', Auth::user()->id)->get();
        if ($specification) {
            foreach ($specification as $spdata) {
                ProductSpecification::find($spdata->id)->update([
                    'product_id' => $data->id,
                ]);
            }
        }

        $this->dispatchBrowserEvent('reseteditor');
        $this->close();
        return redirect()->route('merchent.product');
        $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
    }

    // remove image from multiple image method 
    public function removepreviewImg($removeItem)
    {
        array_splice($this->image, $removeItem);
    }

    // empty all field when save into database 
    public function close()
    {
        $this->title = Null;
        $this->slug = Null;
        $this->categorys_id = Null;
        $this->subcategory_id = Null;
        $this->child_category = Null;
        $this->brand_id = Null;
        $this->thumbnail = Null;
        $this->image = Null;
        $this->mostview = Null;
        $this->description = Null;
        $this->shortdescription = Null;
        $this->availability = Null;
        $this->quantity = 1;
        $this->price = Null;
        $this->sale_price = Null;
        $this->sale_price = Null;
        $this->color = Null;
        $this->sold = Null;
        $this->iteration++;
    }


    public function PsPAction($id, $action)
    {
        if ($action == 'delete') {
            ProductSpecification::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } elseif ($action == 'edit') {
            $this->emit('getModalId', $id);
            $this->dispatchBrowserEvent('openPsPupdateModal');
        }
    }

    public function render()
    {
        if (Auth::user()->user_role == 1) {
            $brands = Brand::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $category = Category::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $subcategory = Subcategory::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $specification = ProductSpecification::where('product_id', NULL)->where('user_id', Auth::user()->id)->get();
            $childCategory = SubSubCategory::where('subcategory_id', $this->subcategory_id)->get();

            return view('livewire.merchent.product.merchent-product-create', compact(['category', 'subcategory', 'brands', 'specification', 'childCategory']));
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
