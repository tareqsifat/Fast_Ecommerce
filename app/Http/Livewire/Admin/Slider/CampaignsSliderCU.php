<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class CampaignsSliderCU extends Component
{

    public $oldImage;

    use WithFileUploads;
    public $name;
    public $title;
    public $subtitle;
    public $link_text;
    public $url;
    public $image;
    public $description;
    public $item;
    public $iteration;


    protected $listeners = [
        'getModalId',
    ];
    /* 
    * action when click trush button 
     */
    public function close()
    {
        $this->name = NULL;
        $this->title = NULL;
        $this->subtitle = NULL;
        $this->link_text = NULL;
        $this->url = NULL;
        $this->image = NULL;
        $this->description = NULL;
        $this->item = NULL;
        $this->oldImage = NULL;
        $this->iteration++;
    }
    /* 
    get value of the input fild
    */
    public function getModalId($item)
    {
        $itemIdentity      = $this->item = $item;
        $fineBydata        = Slider::find($itemIdentity);
        $this->name        = $fineBydata->name;
        $this->title       = $fineBydata->title;
        $this->subtitle    = $fineBydata->subtitle;
        $this->link_text   = $fineBydata->link_text;
        $this->url         = $fineBydata->url;
        $this->description = $fineBydata->description;
        $this->oldImage    = $fineBydata->image;
    }

    /* 
    * save data into database 
    * update data into database
    */
    public function save()
    {
        $this->validate([
            'name'   => 'required|max:200|unique:sliders,name,' . $this->item,
            // 'title'   => 'required',
            // 'subtitle'   => 'required',
            // 'link_text'   => 'max:15',
            'url'   => 'required',
            'description'   => 'max:2000',
        ]);
        // Chake Image if exists 
        if (!is_null($this->image)) {
            $this->validate([
                'image'   => 'required|image|max:1024|dimensions:height=170',
            ], [
                'image.dimensions' => 'Image mustbe In height 170px'
            ]);
            // create folder if not exists
            if (!File::exists('uploads/sliders/campaignslider')) {
                File::makeDirectory('uploads/sliders/campaignslider', 0775, true, true);
            }
            if (file_exists("uploads/sliders/campaignslider/$this->oldImage")) {
                File::delete("uploads/sliders/campaignslider/$this->oldImage");
            }
            $imgName = rand('100', 100) . '-' . $this->image->getClientOriginalName();
            $originalImgName = str_replace(array('\'', '"', ',', ';', '<', '>', '/', ' ', '_'), '-', $imgName);
            Image::make($this->image)->save("uploads/sliders/campaignslider/$originalImgName");
            $image =  $originalImgName;
        } else {
            $image =  $this->oldImage;
        }

        // check Id if Exists
        if (is_null($this->item)) {
            Slider::create([
                'name' => $this->name,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'link_text' => $this->link_text,
                'url'  => $this->url,
                'slug' => str_replace(' ', '-', $this->name),
                'image' => $image,
                'slider_for' => 'campaign',
                'description' => $this->description,
            ]);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Created Successfully']);
            $this->close();
        } else {
            // data update 
            Slider::find($this->item)->update([
                'name' => $this->name,
                'url'  => $this->url,
                'slug' => str_replace(' ', '-', $this->name),
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
    // rander method 
    public function render()
    {
        return view('livewire.admin.slider.campaigns-slider-c-u');
    }
}
