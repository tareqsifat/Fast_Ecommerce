<?php

namespace App\Http\Livewire\Merchent\Product\Brand;

use App\Models\Brand as ModelsBrand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Brand extends Component
{

    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = ModelsBrand::find($id);
        if ($delData->product->count() <= 0) {
            if (file_exists("uploads/brands/$delData->brand_logo")) {
                File::delete("uploads/brands/$delData->brand_logo");
            }
            ModelsBrand::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The Brand :), Because there are {$delData->product->count()}  products under it"]);
        };
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = ModelsBrand::find($data);
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
    // render method 
    public function render()
    {
        if (Auth::user()->user_role == 1) {
            return view('livewire.merchent.product.brand.brand', [
                'datas' => ModelsBrand::where('name', 'LIKE', "%{$this->searchItem}%")
                    ->where('shop_as', 'merchant')
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')->paginate($this->perPage),
                'alldatas' =>  ModelsBrand::where('user_id', Auth::user()->id)->where('shop_as', 'merchant')->get(),
            ]);
        } else {
            return view('livewire.merchent.merchent-permition')->with('message', 'Your are Waiting For admin Approve');
        }
    }
}
