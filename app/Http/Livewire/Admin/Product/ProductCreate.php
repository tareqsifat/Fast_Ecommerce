<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\BabyCategory;
use App\Models\BeforeBornCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\NewBornCategory;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Auth;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductCreate extends Component
{
    use WithFileUploads;
    protected $listeners = ['refreshParent' => '$refresh'];
    public $title;
    public $slug;
    public $category_id;
    public $subcategory_id;
    public $child_category;
    public $baby_category_id;
    public $new_born_category_id;
    public $before_born_category_id;
    public $brand_id;
    public $color;
    public $sold;
    public $thumbnail;
    public $image = [];
    public $mostview;
    public $description;
    public $shortdescription;
    public $availability = 0;
    public $quantity = 1;
    public $price;
    public $sale_price;
    public $offer_time;
    public $iteration;
    public $product_for = 'fast_deals';
    public $shipping = null;
    public $impa_code;

    // save ation method 
    public function save()
    {

        if ($this->shipping || $this->product_for == 'shipping') {
            $this->validate([
                'title' => 'required',
                'slug'  => 'required|unique:products,slug|max:60',
                'subcategory_id' => 'required|int',
                'category_id' => 'required',
                'brand_id'  => 'required|int',
                'quantity' => 'required',
                'price' => 'required',
                'impa_code' => [Rule::requiredIf($this->shipping), Rule::requiredIf($this->product_for == 'shipping'), 'unique:products,impacode'], // impa if product type is shipping
                'child_category' => 'required',
                'thumbnail' => 'required|image|max:512|dimensions:width=500,height=500',
            ], [
                'thumbnail.dimensions' => 'Thumbnai dimensions height and width will be equal Example:500px X 500px',
            ]);
        } else {
            $this->validate([
                'title' => 'required',
                'slug'  => 'required|unique:products,slug|max:60',
                'subcategory_id' => 'required|int',
                'category_id' => 'required',
                'brand_id'  => 'required|int',
                'quantity' => 'required',
                'price' => 'required',
                'child_category' => 'required',
                'thumbnail' => 'required|image|max:512|dimensions:width=500,height=500',
            ], [
                'thumbnail.dimensions' => 'Thumbnai dimensions height and width will be equal Example:500px X 500px',
            ]);
        }


        $thumbfileName = $this->thumbnail->getClientOriginalName();
        $thumbWithoutExt = pathinfo($thumbfileName, PATHINFO_FILENAME);
        $thumbextension = pathinfo($thumbfileName, PATHINFO_EXTENSION);
        $thumbName = $thumbWithoutExt . rand(10, 99) . '.' . $thumbextension;
        $originalThumbName = str_replace(array('\'', '#', '+', '-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
        Image::make($this->thumbnail)->save("uploads/products/thumbnails/$originalThumbName");

        $lastrow = Product::orderBy('id', 'desc')->first();
        $product_code = '#' . rand(100000, 999999999) . $lastrow->id;

        $data = Product::create([
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'product_code' => $product_code,
            'impacode' => $this->impa_code,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'sub_sub_category_id' => $this->child_category,
            'baby_category_id' => $this->baby_category_id,
            'new_born_category_id' => $this->new_born_category_id,
            'before_born_category_id' => $this->before_born_category_id,
            'description2' => $this->shortdescription,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'user_id' => Auth::user()->id,
            'sale_price' => $this->sale_price,
            'availability' => $this->availability,
            'product_for' => $this->product_for,
            'shipping' => $this->shipping,
            'offer_time' => $this->offer_time,
            'thumbnail' => $originalThumbName,
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
                $originalimagesName = str_replace(array('\'', '#', '+', '-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                $this->image[$key] = Image::make($this->image[$key])->save("uploads/products/images/$originalimagesName");
                Productimage::create([
                    'product_id' => $data->id,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
        };
        // inserte product specification 
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
        // redirecr after check condation 
        if ($this->impa_code) {
            return redirect()->route('admin.shipping');
        } elseif ($this->product_for == 'campaign') {
            return redirect()->route('admin.products.campaign');
        } else {
            return redirect()->route('admin.products');
        }
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
        $this->category_id = Null;
        $this->subcategory_id = Null;
        $this->child_category;
        $this->baby_category_id;
        $this->new_born_category_id;
        $this->before_born_category_id;
        $this->brand_id = Null;
        $this->color = Null;
        $this->sold = Null;
        $this->thumbnail = Null;
        $this->image = Null;
        $this->mostview = Null;
        $this->description = Null;
        $this->shortdescription = Null;
        $this->availability = Null;
        $this->quantity = 1;
        $this->price = Null;
        $this->sale_price = Null;
        $this->offer_time = Null;
        $this->iteration++;
    }

    // product specification edit and delete action 
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

    // method to view the component 
    public function render()
    {
        $brands = Brand::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $specification = ProductSpecification::where('product_id', NULL)->where('user_id', Auth::user()->id)->get();
        $subcategory = Subcategory::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $category = Category::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $childCategory = SubSubCategory::where('subcategory_id', $this->subcategory_id)->get();
        $babyCategory = BabyCategory::where('sub_sub_category_id', $this->child_category)->get();
        $newBornCategory = NewBornCategory::where('baby_category_id', $this->baby_category_id)->get();
        $beforeBorn = BeforeBornCategory::where('new_born_category_id', $this->new_born_category_id)->get();
        return view('livewire.admin.product.product-create', compact(['beforeBorn', 'newBornCategory', 'babyCategory', 'subcategory', 'brands', 'specification', 'category', 'childCategory']));
    }
}
