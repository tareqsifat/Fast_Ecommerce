<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class CategoryCreate extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $banner;
    public $item;
    public $old_image;
    public $banner_status;
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
        $this->iteration++;
    }
    /* 
        get value of the input fild
        */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Category::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->description   =  $fineBydata->description;
        $this->old_image   =  $fineBydata->image;
        $this->banner_status   =  $fineBydata->banner_status;
    }

    /* 
        * save data into database 
        * update data into database
        */
    public function save()
    {
        // Chake Image if exists 
        if (!is_null($this->banner)) {
            $this->validate([
                'banner'   => 'max:1024|image|dimensions:height=129, width=1428',
            ], [
                'banner.dimensions' => 'image dimensions height 129px and width 1428px '
            ]);
            // create folder if not exists
            if (!File::exists('uploads/category')) {
                File::makeDirectory('uploads/category', 0775, true, true);
            }
            //check file if exists
            if (file_exists("uploads/category/$this->old_image")) {
                File::delete("uploads/category/$this->old_image");
            }
            $imgName = rand('10', 100) . '-' . $this->banner->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->banner)
                ->save("uploads/category/$originalImgName");
            $image =  $originalImgName;
        } else {
            $image =  $this->old_image;
        }

        if (is_null($this->item)) {
            $this->validate([
                'name'   => 'required|max:200|unique:categories,name',
                'description'   => 'max:2000',
            ]);
            Auth::user()->user_as == 'merchent' ? $shop_as = 'merchant' : $shop_as = 'fast_deals';
            Category::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
                'shop_as' => $shop_as,
                'image' => $image,
                'user_id' => Auth::user()->id,
                'description' => $this->description,
                'banner_status' => $this->banner_status,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            $this->validate([
                'name'   => 'required|max:200|unique:categories,name,' . $this->item,
                'description'   => 'max:2000',
            ]);
            Category::find($this->item)->update([
                'name' => $this->name,
                'slug' => str_replace(' ', '-', $this->name),
                'description' => $this->description,
                'image' => $image,
                'banner_status' => $this->banner_status,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
    }

    /* 
        *   livewire view
        */
    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
