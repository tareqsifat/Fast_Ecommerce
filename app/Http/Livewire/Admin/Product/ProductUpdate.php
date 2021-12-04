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
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductUpdate extends Component
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
    public $thumbnail;
    public $image = [];
    public $mostview;
    public $oldcolor;
    public $color;
    public $sold;
    public $description;
    public $shortdescription;
    public $olddesc;
    public $availability = 1;
    public $quantity = 1;
    public $price;
    public $sale_price;
    public $iteration;
    public $pId;
    public $productById;
    public $offer_time;
    public $product_for;
    public $impa_code;
    public $shipping = null;



    /** 
     * mont method to display the property value
     * @return \Illuminate\Http\Response
     */
    public function mount($id)
    {
        $this->pId = $id;
        $productById   = Product::where('id', $id)->first();
        if ($productById) {
            $this->productById      = $productById;
            $this->title            = $productById->title;
            $this->slug             = $productById->slug;
            $this->category_id      = $productById->category_id;
            $this->subcategory_id   = $productById->subcategory_id;
            $this->child_category   = $productById->sub_sub_category_id;
            $this->baby_category_id   = $productById->baby_category_id;
            $this->new_born_category_id   = $productById->new_born_category_id;
            $this->before_born_category_id   = $productById->before_born_category_id;
            $this->brand_id         = $productById->brand_id;
            $this->description      = $productById->description;
            $this->shortdescription = $productById->description2;
            $this->availability     = $productById->availability;
            $this->quantity         = $productById->quantity;
            $this->price            = $productById->price;
            $this->sale_price       = $productById->sale_price;
            $this->offer_time       = $productById->offer_time;
            $this->product_for      = $productById->product_for;
            $this->impa_code        = $productById->impacode;
            $this->oldcolor         = $productById->color;
            $this->shipping         = $productById->shipping;
            $this->color            = $productById->color;
            $this->sold             = $productById->sold;
        } else {
            return abort(404);
        }
    }


    /** 
     * save ation method 
     * save into data base fromt user input when update
     * @return \Illuminate\Http\Response
     */
    public function updateProduct()
    {
        $this->validate([
            'title' => 'required',
            'slug'  => "required|unique:products,slug,$this->pId",
            'category_id' => 'required',
            'subcategory_id' => 'required|int',
            'brand_id'  => 'required|int',
            'quantity' => 'required',
            'price' => 'required',
            'child_category' => 'required',
        ]);

        if (is_null($this->impa_code) || !$this->shipping) {
            $this->impa_code = NULL;
            $this->shipping = NULL;
        }
        if (!is_null($this->impa_code)) {
            $this->validate([
                'impa_code' => [Rule::requiredIf($this->shipping == true), Rule::requiredIf($this->product_for == 'shipping'), "unique:products,impacode,$this->pId"], // impa if product type is shipping
            ]);
        }

        if (!is_null($this->thumbnail)) {
            $this->validate([
                'thumbnail' => 'image|max:512|dimensions:dimensions:width=500,height=500',
            ], [
                'thumbnail.dimensions' => 'Thumbnai dimensions height and width will be equal Example:500px X 500px',
            ]);
            if (file_exists("uploads/products/thumbnails/$this->productById->thumbnail")) {
                File::delete("uploads/products/thumbnails/$this->productById->thumbnail");
            };
            $thumbfileName = $this->thumbnail->getClientOriginalName();
            $thumbWithoutExt = pathinfo($thumbfileName, PATHINFO_FILENAME);
            $thumbextension = pathinfo($thumbfileName, PATHINFO_EXTENSION);
            $thumbName = $thumbWithoutExt . rand(10, 99) . '.' . $thumbextension;
            $originalThumbName = str_replace(array('\'', '#', '+', '-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
            Image::make($this->thumbnail)->save("uploads/products/thumbnails/$originalThumbName");
            Product::find($this->pId)->update([
                'thumbnail' => $originalThumbName,
            ]);
        }

        $data = Product::find($this->pId)->update([
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'description' => $this->description,
            'description2' => $this->shortdescription,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'sub_sub_category_id' => $this->child_category,
            'baby_category_id' => $this->baby_category_id,
            'new_born_category_id' => $this->new_born_category_id,
            'before_born_category_id_id' => $this->before_born_category_id,
            'color' => $this->color,
            'sold' => $this->sold,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'offer_time' => $this->offer_time,
            'availability' => $this->availability,
            'impacode' => $this->impa_code,
            'shipping' => $this->shipping,
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
                    'product_id' => $this->pId,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
        };
        $specification = ProductSpecification::where('product_id', NULL)->get();
        if ($specification) {
            foreach ($specification as $spdata) {
                ProductSpecification::find($spdata->id)->update([
                    'product_id' => $this->pId,
                ]);
            }
        }
        $this->close();
        // redirecr after check condation 
        if ($this->impa_code) {
            return redirect()->route('admin.shipping');
        } elseif ($this->product_for == 'campaign') {
            return redirect()->route('admin.products.campaign');
        } else {
            return redirect()->route('admin.products');
        }
        $this->dispatchBrowserEvent('successalert', ['success' => 'Update Successfully']);
    }


    /** 
     * remove image from multiple image method 
     * @return \Illuminate\Http\Response
     */
    public function removepreviewThumb()
    {
        $this->thumbnail = Null;
        $this->iteration++;
    }


    /**
     * remove old image fromt the view component 
     * 
     * @return \Illuminate\Http\Response
     */
    public function removepreviewImg($removeItem)
    {
        array_splice($this->image, $removeItem);
    }

    /**
     * empty all field when save into database 
     * @return \Illuminate\Http\Response
     */
    public function close()
    {

        $this->title = Null;
        $this->slug = Null;
        $this->category_id = Null;
        $this->subcategory_id = Null;
        $this->child_category = Null;
        $this->baby_category_id = Null;
        $this->new_born_category_id = Null;
        $this->before_born_category_id_id = Null;
        $this->brand_id = Null;
        $this->thumbnail = Null;
        $this->color = Null;
        $this->sold = Null;
        $this->image = Null;
        $this->mostview = Null;
        $this->description = Null;
        $this->shortdescription = Null;
        $this->availability = Null;
        $this->quantity = 1;
        $this->price = Null;
        $this->sale_price = Null;
        $this->iteration++;
        $this->pId = Null;
        $this->productById = Null;
    }

    /**
     * remove old image fromt the view component 
     * @return \Illuminate\Http\Response
     */

    public function removeOldImg($id)
    {
        $delId = Productimage::find($id);
        if ($delId) {
            if (file_exists("uploads/products/images/$delId->image")) {
                File::delete("uploads/products/images/$delId->image");
            };
            Productimage::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'The Product Image Delete Successfully']);
        }
    }

    /**
     * delete  ProductSpecification from the view component 
     * @return \Illuminate\Http\Response
     */
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
    /**
     * rander method 
     * @return \Illuminate\Http\livewire\
     */

    public function render()
    {
        $category = Category::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $subcategory = Subcategory::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $brands = Brand::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $product = Product::where('id', $this->pId)->first();
        $oldspecification = ProductSpecification::where('product_id', $this->pId)->get();
        $specification = ProductSpecification::where('product_id', NULL)->where('user_id', Auth::user()->id)->get();
        $childCategory = SubSubCategory::where('subcategory_id', $this->subcategory_id)->get();
        $babyCategory = BabyCategory::where('sub_sub_category_id', $this->child_category)->get();
        $newBornCategory = NewBornCategory::where('baby_category_id', $this->baby_category_id)->get();
        $beforeBorn = BeforeBornCategory::where('new_born_category_id', $this->new_born_category_id)->get();
        return view('livewire.admin.product.product-update', compact(['beforeBorn', 'newBornCategory', 'category', 'subcategory', 'babyCategory', 'brands', 'product', 'oldspecification', 'specification', 'childCategory']));
    }
}
