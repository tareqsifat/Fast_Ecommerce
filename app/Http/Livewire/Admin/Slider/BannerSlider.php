<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class BannerSlider extends Component
{
    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Slider::find($id);
        if (file_exists("uploads/sliders/bannerslider/$delData->image")) {
            File::delete("uploads/sliders/bannerslider/$delData->image");
        }
        Slider::destroy($id);
        $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Slider::find($data);
        if ($action == 'edit') {
            $this->emit('getModalId', $this->item);
            $this->dispatchBrowserEvent('openmodal');
        } elseif ($action == 'desable') { /* action where click status button */
            $newData->status = 1;
            $newData->save();
        } elseif ($action == 'enable') {
            $newData->status = 0;
            $newData->save();
        }
    }
    // loadMore method option 
    public function loadMore()
    {
        $this->perPage = $this->perPage + 10;
    }

    public function render()
    {
        return view('livewire.admin.slider.banner-slider', [
            'datas' => Slider::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('slider_for', 'banner_slider')
                ->orwhere('title', 'LIKE', "%{$this->searchItem}%")
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  Slider::all()
        ]);
    }
}
