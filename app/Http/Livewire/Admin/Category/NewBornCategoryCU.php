<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\BabyCategory;
use App\Models\NewBornCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class NewBornCategoryCU extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $description;
    public $item;
    public $subcategory_id;
    public $sub_sub_category_id;
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
        $this->sub_sub_category_id = null;
        $this->name = null;
        $this->slug = null;
        $this->image = null;
        $this->old_image = null;
        $this->description = null;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = NewBornCategory::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->sub_sub_category_id   =  $fineBydata->baby_category_id;
        $this->subcategory_id   =  $fineBydata->babyCategory->SubSubCategory->id;
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
            'slug'   => 'required|max:200|unique:new_born_categories,slug,' . $this->item,
            'description'   => 'max:2000',
            'subcategory_id'   => 'required',
            'sub_sub_category_id'   => 'required',
        ], [
            'sub_sub_category_id.required' => 'The Filed is required',
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
            NewBornCategory::create([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'shop_as' => $shop_as,
                'user_id' => Auth::user()->id,
                'baby_category_id' => $this->sub_sub_category_id,
                'image' => $image,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            NewBornCategory::find($this->item)->update([
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                'baby_category_id' => $this->sub_sub_category_id,
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

        $subcategorys = SubSubCategory::where('status', 0)->where('shop_as', 'fast_deals')->get();
        $pCatData = BabyCategory::where('sub_sub_category_id', $this->subcategory_id)->where('status', 0)->where('shop_as', 'fast_deals')->get();
        return view('livewire.admin.category.new-born-category-c-u', compact(['pCatData', 'subcategorys']));
    }
}
