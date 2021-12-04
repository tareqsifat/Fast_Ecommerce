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
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class MerchentProductEdit extends Component
{
    use WithFileUploads;
    protected $listeners = ['refreshParent' => '$refresh'];
    public $title;
    public $slug;
    public $categorys_id;
    public $child_category;
    public $subcategory_id;
    public $brand_id;
    public $thumbnail;
    public $image = [];
    public $mostview;
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
    public $color;
    public $sold;

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
            $this->categorys_id     = $productById->category_id;
            $this->subcategory_id   = $productById->subcategory_id;
            $this->brand_id         = $productById->brand_id;
            $this->description      = $productById->description;
            $this->shortdescription = $productById->description2;
            $this->availability     = $productById->availability;
            $this->quantity         = $productById->quantity;
            $this->price            = $productById->price;
            $this->sale_price       = $productById->sale_price;
            $this->color            = $productById->color;
            $this->sold             = $productById->sold;
            $this->child_category   = $productById->sub_sub_category_id;
        } else {
            return abort(404);
        }
    }
    /** 
     * save ation method 
     * save into data base fromt user input when update
     * @return \Illuminate\Http\Response
     */
    public function save()
    {

        $this->validate([
            'title' => 'required',
            'slug'  => "required|unique:products,slug,$this->pId",
            'categorys_id' => 'required|int',
            'subcategory_id' => 'required|int',
            'brand_id'  => 'required|int',
            'quantity' => 'required',
            'price' => 'required',
            'child_category' => 'required',
        ]);
        if (!is_null($this->thumbnail)) {
            $this->validate([
                'thumbnail' => 'image|max:512|dimensions:width:500,height=500',
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
            $originalThumbName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
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
            'category_id' => $this->categorys_id,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'offer_time' => $this->offer_time,
            'availability' => $this->availability,
            'sub_sub_category_id' => $this->child_category,
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
        return redirect()->route('merchent.product');
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
        $this->categorys_id = Null;
        $this->subcategory_id = Null;
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
        $this->iteration++;
        $this->pId = Null;
        $this->productById = Null;
        $this->child_category = Null;
        $this->color = Null;
        $this->sold = Null;
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
        if (Auth::user()->user_role == 1) {
            $brands = Brand::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $category = Category::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $subcategory = Subcategory::where('status', 0)->where('user_id', Auth::user()->id)->get();
            $product = Product::where('id', $this->pId)->first();
            $specification = ProductSpecification::where('product_id', NULL)->where('user_id', Auth::user()->id)->get();
            $oldspecification = ProductSpecification::where('product_id', $this->pId)->get();
            $childCategory = SubSubCategory::where('subcategory_id', $this->subcategory_id)->get();
            return view('livewire.merchent.product.merchent-product-edit', compact(['childCategory', 'category', 'subcategory', 'brands', 'product', 'specification', 'oldspecification']));
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
