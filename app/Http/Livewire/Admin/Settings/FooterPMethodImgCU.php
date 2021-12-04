<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Pmethod;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class FooterPMethodImgCU extends Component
{


    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $description;
    public $item;
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
        $this->image = null;
        $this->old_image = null;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Pmethod::find($itemIdentity);
        $this->name   =  $fineBydata->name;
        $this->old_image   =  $fineBydata->image;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'name'   => 'required|max:200|unique:pmethods,name,' . $this->item,
        ]);
        // Chake Image if exists 
        if (!is_null($this->image)) {
            $this->validate([
                'image'   => 'max:1024|image|dimensions:height=150, width=150',
            ], [
                'image.dimensions' => 'Image dimensions height and width must in 150px X 150px'
            ]);
            if (file_exists("uploads/brands/$this->old_image")) {
                File::delete("uploads/brands/$this->old_image");
            }
            $imgName = rand('10', 100) . '-' . $this->image->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->image)
                ->save("uploads/payment/$originalImgName");
            $image =  $originalImgName;
        } else {
            $image =  $this->old_image;
        }
        // check Id if Exists
        if (is_null($this->item)) {
            Pmethod::create([
                'name' => $this->name,
                'image' => $image,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            Pmethod::find($this->item)->update([
                'name' => $this->name,
                'image' => $image,
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
        return view('livewire.admin.settings.footer-p-method-img-c-u');
    }
}
