<?php

namespace App\Http\Livewire\Admin\Product\Campaigns;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Productimage;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;
class CampaignCreate extends Component
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
    public $sellingStatus;


    // save ation method 
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'slug'  => 'required|unique:products,slug|max:60',
            'subcategory_id' => 'required|int',
            'brand_id'  => 'required|int',
            'quantity' => 'required',
            'price' => 'required',
            'thumbnail' => 'required|image|max:512|dimensions:height=800,width=800',
        ], [
            'thumbnail.dimensions' => 'Thumbnai dimensions must be height 800px and width 800px',
        ]);

        $thumbfileName = $this->thumbnail->getClientOriginalName();
        $thumbWithoutExt = pathinfo($thumbfileName, PATHINFO_FILENAME);
        $thumbextension = pathinfo($thumbfileName, PATHINFO_EXTENSION);
        $thumbName = $thumbWithoutExt . rand(10, 99) . '.' . $thumbextension;
        $originalThumbName = str_replace(array('\'','#','+','-', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $thumbName);
        Image::make($this->thumbnail)->save("uploads/products/thumbnails/$originalThumbName");

        $data = Product::create([
            'title' => $this->title,
             'slug' => Str::slug($this->slug),
            'product_code' => '#' . rand(100000, 999999999),
            'description' => $this->description,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'product_for' => 'campaign',
            'availability' => $this->availability,
            'sellingStatus' => $this->sellingStatus,
            'thumbnail' => $originalThumbName,
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
                    'product_id' => $data->id,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
        };

        $this->dispatchBrowserEvent('reseteditor');
        $this->close();
        return redirect()->route('admin.products.campaign');
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
        $this->sellingStatus = Null;
        $this->iteration++;
    }

    public function render()
    {
        $brands = Brand::where('status', 0)->get();
        $subcategory = Subcategory::where('status', 0)->get();
        return view('livewire.admin.product.campaigns.campaign-create', compact(['subcategory', 'brands']));
    }
}
