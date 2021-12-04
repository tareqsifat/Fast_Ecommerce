<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Image;
use Livewire\WithFileUploads;

class BrandsCU extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $brand_logo;
    public $description;
    public $item;
    public $old_brand_logo;
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
        $this->brand_logo = null;
        $this->old_brand_logo = null;
        $this->description = null;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Brand::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->description   =  $fineBydata->description;
        $this->old_brand_logo   =  $fineBydata->brand_logo;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'name'   => 'required|max:200|unique:brands,name,' . $this->item,
            'description'   => 'max:2000',
        ]);
        // Chake Image if exists 
        if (!is_null($this->brand_logo)) {
            $this->validate([
                'brand_logo'   => 'max:1024|image|dimensions:ratio=1/1',
            ], [
                'brand_logo.dimensions' => 'image dimensions height and width will be equal Example:500px X 500px'
            ]);
            if (file_exists("uploads/brands/$this->old_brand_logo")) {
                File::delete("uploads/brands/$this->old_brand_logo");
            }
            $imgName = rand('10', 100) . '-' . $this->brand_logo->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->brand_logo)
                ->save("uploads/brands/$originalImgName");
            $brand_logo =  $originalImgName;
        } else {
            $brand_logo =  $this->old_brand_logo;
        }
        Auth::user()->user_as == 'merchent' ? $shop_as = 'merchant' : $shop_as = 'fast_deals';
        // check Id if Exists
        if (is_null($this->item)) {
            Brand::create([
                'name' => $this->name,
                'shop_as' => $shop_as,
                'user_id' => Auth::user()->id,
                'slug' => str_replace(' ', '-', $this->name),
                'brand_logo' => $brand_logo,
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            Brand::find($this->item)->update([
                'name' => $this->name,
                'slug' => str_replace(' ', '-', $this->name),
                'brand_logo' => $brand_logo,
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
        $this->brand_logo = Null;
        $this->iteration++;
    }

    /* 
    *   livewire view
    */
    public function render()
    {
        return view('livewire.admin.brands.brands-c-u');
    }
}
