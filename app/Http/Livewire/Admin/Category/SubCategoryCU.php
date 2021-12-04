<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class SubCategoryCU extends Component
{
    use WithFileUploads;
    public $name;
    public $category_id;
    public $slug;
    public $description;
    public $item;
    public $image;
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
        $this->name = null;
        $this->description = null;
        $this->category_id = null;
        $this->old_image = null;
        $this->image = null;
        $this->slug = null;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Subcategory::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->category_id   =  $fineBydata->category_id;
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

        if (is_null($this->item)) {
            $this->validate([
                'name'   => 'required',
                'slug'   => 'required|max:200|unique:subcategories,slug',
                'description'   => 'max:2000',
                'category_id'   => 'required',
            ]);

            Auth::user()->user_as == 'merchent' ? $shop_as = 'merchant' : $shop_as = 'fast_deals';
            Subcategory::create([
                'category_id' => $this->category_id,
                'shop_as' => $shop_as,
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'image' => $image,
                'description' => $this->description,
                'slug' => str_replace(' ', '-', $this->name),
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            $this->validate([
                'name'   => 'required',
                'slug'   => 'required|max:200|unique:subcategories,slug,' . $this->item,
                'description'   => 'max:2000',
                'category_id'   => 'required',
            ]);
            Subcategory::find($this->item)->update([
                'name' => $this->name,
                'slug' => str_replace(' ', '-', $this->slug),
                'description' => $this->description,
                'image' => $image,
                'category_id' => $this->category_id,
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


    public function render()
    {
        if (Auth::user()->user_as == 'merchent') {
            $pcategory = Category::where('status', 0)->where('user_id', Auth::user()->id)->get();
        } else {
            $pcategory = Category::where('status', 0)->where('shop_as', 'fast_deals')->get();
        }
        return view('livewire.admin.category.sub-category-c-u', compact('pcategory'));
    }
}
