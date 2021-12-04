<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ShowMerchantBrand extends Component
{


    public $perPage = 10;
    public $searchItem;
    public $item;
    protected $listeners = ['refreshParent' => '$refresh'];

    // delete into database 
    public function delete($id)
    {
        $delData = Brand::find($id);
        if ($delData->product->count() <= 0) {
            if (file_exists("uploads/brands/$delData->brand_logo")) {
                File::delete("uploads/brands/$delData->brand_logo");
            }
            Brand::destroy($id);
            $this->dispatchBrowserEvent('successalert', ['success' => 'Delete Successfully']);
        } else {
            $this->dispatchBrowserEvent('erroralert', ['erroralert' => "You can't delete The Brand :), Because there are {$delData->product->count()}  products under it"]);
        };
    }
    // action after edite button click
    public function selectItem($data, $action)
    {
        $this->item = $data;
        $newData = Brand::find($data);
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
        return view('livewire.admin.product.show-merchant-brand', [
            'datas' => Brand::where('name', 'LIKE', "%{$this->searchItem}%")
                ->where('shop_as', 'merchant')
                ->orderBy('id', 'desc')->paginate($this->perPage),
            'alldatas' =>  Brand::where('shop_as', 'merchant')->get()
        ]);
    }
}
