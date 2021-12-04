<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\ServeceImage;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;

class ServiceCU extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $icon;
    public $description;
    public $item;
    public $background;
    public $image;
    public $oldimageData;
    public $iteration;
    protected $listeners = [
        'getModalId',
    ];


    /* 
    value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity = $this->item = $item;
        $fineBydata   = Service::find($itemIdentity);
        $this->title   =  $fineBydata->title;
        $this->subtitle   =  $fineBydata->subtitle;
        $this->icon   =  $fineBydata->icon;
        $this->background   =  $fineBydata->bg;
        $this->description    =  $fineBydata->description;
        $this->oldimageData  = ServeceImage::where('service_id', $item)->get();
    }
    /* 
    * action when click close button
    * action when click trush button 
     */
    public function close()
    {
        $this->title  = null;
        $this->subtitle  = null;
        $this->icon  = null;
        $this->background  = null;
        $this->description   = null;
        $this->item   = null;
        $this->image   = null;
        $this->iteration++;
    }


    /*  
        validation rule
    */
    protected $rules = [
        'title'   => 'required|max:50',
        'subtitle'   => 'max:50',
        'background'   => 'required',
        'icon'   => 'required',
        'description'    => 'required',
    ];

    /*     
    * live validation preview
    */
    public function updated($propertytitle)
    {
        $this->validateOnly($propertytitle);
    }
    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $validatedData = $this->validate();
        if ($this->item == true) {
            $this->validate([
                'title' => "unique:services,title,$this->item",
            ]);

            Service::find($this->item)->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'bg' => $this->background,
                'subtitle' => $this->subtitle,
                'icon' => $this->icon,
                'description' => $this->description,
            ]);
            $i = 1;
            if (!is_null($this->image)) {
                foreach ($this->image as $key => $image) {
                    $imagesfileName = $image->getClientOriginalName();
                    $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
                    $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
                    $imagesName = $filename . $i . '.' . $extension;
                    $originalimagesName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                    $this->image[$key] = Image::make($this->image[$key])->save("uploads/services/$originalimagesName");
                    ServeceImage::create([
                        'service_id' => $this->item,
                        'image' => $originalimagesName,
                    ]);
                    $i++;
                };
            };
            $this->dispatchBrowserEvent('successalert', ['success' => 'Updated Successfully']);
            $this->close();
        } else {
            $this->validate([
                'image' => 'required',
                'title' => 'unique:services,title'
            ]);
            $serviceCreateData = Service::create([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'subtitle' => $this->subtitle,
                'bg' => $this->background,
                'icon' => $this->icon,
                'description' => $this->description,
            ]);
            $i = 1;

            foreach ($this->image as $key => $image) {
                $imagesfileName = $image->getClientOriginalName();
                $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
                $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
                $imagesName = $filename . $i . '.' . $extension;
                $originalimagesName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imagesName);
                $this->image[$key] = Image::make($this->image[$key])->save("uploads/services/$originalimagesName");
                ServeceImage::create([
                    'service_id' => $serviceCreateData->id,
                    'image' => $originalimagesName,
                ]);
                $i++;
            };
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
        }
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->close();
    }
    // remove image from multiple image method 
    public function removepreviewImg($removeItem)
    {
        array_splice($this->image, $removeItem);
    }
    /**
     * remove old image fromt the view component 
     * @return \Illuminate\Http\Response
     */

    public function removeOldImg($id)
    {
        $delId = ServeceImage::find($id);
        if ($delId) {
            if (file_exists("uploads/services/$delId->image")) {
                File::delete("uploads/services/$delId->image");
            };
            ServeceImage::destroy($id);
            $this->oldimageData  = ServeceImage::where('service_id', $this->item)->get();
            $this->dispatchBrowserEvent('successalert', ['success' => 'The Image Delete Successfully']);
        }
    }

    /* 
    *   livewire view
    */
    public function render()
    {
        return view('livewire.admin.service.service-c-u');
    }
}
