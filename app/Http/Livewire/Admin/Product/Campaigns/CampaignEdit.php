<?php

namespace App\Http\Livewire\Admin\Product\Campaigns;

use Livewire\Component;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Subcategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class CampaignEdit extends Component
{




    use WithFileUploads;
    protected $listeners = ['refreshParent' => '$refresh'];
    public $title;
    public $slug;
    public $subcategory_id;
    public $brand_id;
    public $thumbnail;
    public $image = [];
    public $mostview;
    public $description;
    public $availability = 1;
    public $quantity = 1;
    public $price;
    public $sale_price;
    public $iteration;
    public $pId;
    public $productById;

    /** 
     * mont method to display the property value
     * @return \Illuminate\Http\Response
     */
    public function mount($id)
    {
        $this->pId = $id;
        $productById           = Product::where('id', $id)->first();
        if ($productById) {
            $this->productById     = $productById;
            $this->title           = $productById->title;
            $this->slug            = $productById->slug;
            $this->subcategory_id = $productById->subcategory_id;
            $this->brand_id        = $productById->brand_id;
            $this->description     = $productById->description;
            $this->availability    = $productById->availability;
            $this->quantity        = $productById->quantity;
            $this->price           = $productById->price;
            $this->sale_price      = $productById->sale_price;
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
            'subcategory_id' => 'required|int',
            'brand_id'  => 'required|int',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        if (!is_null($this->thumbnail)) {
            $this->validate([
                'thumbnail' => 'image|max:512|dimensions:height=800,width=800',
            ], [
                'thumbnail.dimensions' => 'Thumbnai dimensions must be height 800px and width 800px',
            ]);
            if (file_exists("uploads/products/thumbnails/$this->productById->thumbnail")) {
                File::delete("uploads/products/thumbnails/$this->productById->thumbnail");
            };
            $thumbfileName = $this->thumbnail->getClientOriginalName();
            $thumbWithoutExt = pathinfo($thumbfileName, PATHINFO_FILENAME);
            $thumbextension = pathinfo($thumbfileName, PATHINFO_EXTENSION);
            $thumbName = $thumbWithoutExt . rand(10, 99) . '.' . $thumbextension;
            $originalThumbName = str_replace(array('\'','#','+','-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
            Image::make($this->thumbnail)->save("uploads/products/thumbnails/$originalThumbName");
            Product::find($this->pId)->update([
                'thumbnail' => $originalThumbName,
            ]);
        }
        $data = Product::find($this->pId)->update([
            'title' => $this->title,
            'slug' => Str::slug($this->slug),
            'description' => $this->description,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'availability' => $this->availability,
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
                $originalimagesName = str_replace(array('\'','#','+','-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                $this->image[$key] = Image::make($this->image[$key])->save("uploads/products/campaign/images/$originalimagesName");
                Productimage::create([
                    'product_id' => $this->pId,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
        };
        $this->close();
        return redirect()->route('admin.products.campaign');
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
        $this->subcategory_id = Null;
        $this->brand_id = Null;
        $this->thumbnail = Null;
        $this->image = Null;
        $this->mostview = Null;
        $this->description = Null;
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
            if (file_exists("uploads/products/campaign/images/$delId->image")) {
                File::delete("uploads/products/campaign/images/$delId->image");
            };
            Productimage::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'The Product Image Delete Successfully']);
        }
    }

    /**
     * rander method 
     * @return \Illuminate\Http\livewire\
     */

    public function render()
    {
        $brands = Brand::where('status', 0)->get();
        $subcategory = Subcategory::where('status', 0)->get();
        $product = Product::where('id', $this->pId)->first();
        return view('livewire.admin.product.campaigns.campaign-edit', compact(['subcategory', 'brands', 'product']));
    }
}
