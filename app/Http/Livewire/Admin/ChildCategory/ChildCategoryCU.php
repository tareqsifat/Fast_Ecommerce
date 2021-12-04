<?php

namespace App\Http\Livewire\Admin\ChildCategory;

use App\Models\Subcategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ChildCategoryCU extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $description;
    public $item;
    public $subcategory_id;
    public $old_image;
    public $iteration;

    protected $listeners = [
        'getModalId',
    ];
    /* 
    * action when click close button
    * action when click trush button 
     */
    public function close()
    {
        $this->item = null;
        $this->subcategory_id = null;
        $this->name = null;
        $this->image = null;
        $this->old_image = null;
        $this->description = null;
        $this->slug = null;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = SubSubCategory::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->subcategory_id   =  $fineBydata->subcategory_id;
        $this->description   =  $fineBydata->description;
        $this->slug   =  $fineBydata->slug;
        $this->old_image   =  $fineBydata->image;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'name'   => 'required',
            'slug'   => 'required|max:200|unique:sub_sub_categories,slug,' . $this->item,
            'description'   => 'max:2000',
            'subcategory_id'   => 'required',
        ]);
        // Chake Image if exists 
        if (!is_null($this->image)) {
            $this->validate([
                'image'   => 'max:1024|image|dimensions:width=500,height=500',
            ], [
                'image.dimensions' => 'image dimensions height and width will be equal Example:500px X 500px'
            ]);
            // create folder if not exists
            if (!File::exists('uploads/category')) {
                File::makeDirectory('uploads/category', 0775, true, true);
            }
            //check file if exists
            if (file_exists("uploads/category/$this->old_image")) {
                File::delete("uploads/category/$this->old_image");
            }
            $imgName = rand('10', 100) . '-' . $this->image->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->image)
                ->save("uploads/category/$originalImgName");
            $image =  $originalImgName;
        } else {
            $image =  $this->old_image;
        }
        Auth::user()->user_as == 'merchent' ? $shop_as = 'merchant' : $shop_as = 'fast_deals';
        // check Id if Exists
        if (is_null($this->item)) {
            SubSubCategory::create([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'shop_as' => $shop_as,
                'user_id' => Auth::user()->id,
                'subcategory_id' => $this->subcategory_id,
                'image' => $image,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            SubSubCategory::find($this->item)->update([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'subcategory_id' => $this->subcategory_id,
                'image' => $image,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }

    /** 
     * removepreviewThumb
     * @return \Illuminate\Http\Response
     */

    public function removepreviewThumb()
    {
        $this->image = Null;
        $this->iteration++;
    }

    /* 
    *   livewire view
    */
    public function render()
    {
        $pBrands = Subcategory::where('status', 0)->where('shop_as', 'fast_deals')->get();
        return view('livewire.admin.child-category.child-category-c-u', compact('pBrands'));
    }
}
